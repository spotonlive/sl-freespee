<?php

namespace SpotOnLive\Freespee\Services;

use SpotOnLive\Freespee\Exceptions\InvalidAPICallException;
use SpotOnLive\Freespee\Exceptions\InvalidCredentialsException;
use SpotOnLive\Freespee\Exceptions\InvalidAreaException;
use SpotOnLive\Freespee\Models\Call;
use SpotOnLive\Freespee\Models\Customer;
use SpotOnLive\Freespee\Models\CustomerAddress;
use SpotOnLive\Freespee\Options\ApiOptions;

class FreespeeService implements FreespeeServiceInterface
{
    /** @var ApiOptions */
    protected $config;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = new ApiOptions($config);
    }

    /**
     * Find customers
     *
     * @param int $page
     * @return array|\SpotOnLive\Freespee\Models\Customer[]
     */
    public function findAllCustomers($page = 0)
    {
        $customers = $this->api('/customers', [
            'page' => $page,
        ]);

        /** @var array|Customer[] $return */
        $return = [];

        foreach ($customers['customers'] as $customerData) {
            $customer = new Customer();
            $customer->setId($customerData['customer_id']);
            $customer->setName($customerData['name']);
            $customer->setCustomerNumber($customerData['custnr']);
            $customer->setCorporateId($customerData['corporateid']);
            $customer->setEmail($customerData['email']);
            $customer->setUuid($customerData['uuid']);
            $customer->setReceiveMonthlyReport((int) $customerData['receive_monthly_report']);
            $customer->setFreespeeCallerId($customerData['freespee_caller_id']);

            // Address
            $address = new CustomerAddress();
            $address->setStreet($customerData['address_street']);
            $address->setZip($customerData['address_zip']);
            $address->setCity($customerData['address_city']);
            $address->setState($customerData['address_state']);
            $address->setCountry($customerData['address_country']);

            $customer->setAddress($address);

            $return[] = $customer;
        }

        return $return;
    }

    /**
     * Get total number of customers
     *
     * @return integer
     */
    public function getTotalNumberOfCustomers()
    {
        $customers = $this->api('/customers');
        return $customers['total'];
    }

    /**
     * Find customer
     *
     * @param integer $id
     * @return Customer|null
     */
    public function findCustomer($id)
    {
        $customerData = $this->api('/customers/', [
            'customer_id' => $id,
        ]);

        if (!isset($customerData['customers'][0])) {
            return null;
        }

        /** @var array $customerData */
        $customerData = $customerData['customers'][0];

        $customer = new Customer();
        $customer->setId($customerData['customer_id']);
        $customer->setName($customerData['name']);
        $customer->setCustomerNumber($customerData['custnr']);
        $customer->setCorporateId($customerData['corporateid']);
        $customer->setEmail($customerData['email']);
        $customer->setUuid($customerData['uuid']);
        $customer->setReceiveMonthlyReport((int) $customerData['receive_monthly_report']);
        $customer->setFreespeeCallerId($customerData['freespee_caller_id']);

        // Address
        $address = new CustomerAddress();
        $address->setStreet($customerData['address_street']);
        $address->setZip($customerData['address_zip']);
        $address->setCity($customerData['address_city']);
        $address->setState($customerData['address_state']);
        $address->setCountry($customerData['address_country']);

        $customer->setAddress($address);

        return $customer;
    }

    /**
     * Find calls
     *
     * @param Customer $customer
     * @param array $params
     * @return array
     */
    public function findCalls(Customer $customer, $params = [])
    {
        // Set customer id
        $params['customer_id'] = $customer->getId();
        $callsData = $this->api('/statistics/cdrs', $params);

        $return = [
            'total' => $callsData['total'],
            'page' => $callsData['page'],
            'pageSize' => $callsData['pagesize'],
            'numberOfPages' => $callsData['numpages'],
            'results' => [],
        ];

        foreach ($callsData['cdrs'] as $callData) {
            $call = new Call();
            $call->setCdrId($callData['cdr_id']);
            $call->setStart(new \DateTime($callData['start']));
            $call->setDuration($callData['duration']);
            $call->setDurationAdjusted($callData['duration_adjusted']);
            $call->setAnum($callData['anum']);
            $call->setAnumMd5($callData['anum_md5']);
            $call->setBnum($callData['bnum']);
            $call->setCnum($callData['cnum']);
            $call->setCustomerId($callData['customer_id']);
            $call->setSourceId($callData['source_id']);
            $call->setCustomerId($callData['custnr']);
            $call->setAnswered($callData['answered']);
            $call->setQuarantined($callData['quarantined']);
            $call->setAnumNdcName($callData['anum_ndc_name']);

            $return['results'][] = $call;
        }

        return $return;
    }

    /**
     * Call API
     *
     * @param string $url
     * @param array $params
     * @return array
     * @throws InvalidAPICallException
     * @throws InvalidCredentialsException
     */
    public function api($url, array $params = [])
    {
        if(!empty($params)){
            $queryString = http_build_query($params);
            $url .= "?" . $queryString;
        }

        // Curl
        $curl = curl_init();

        // Type
        curl_setopt($curl, CURLOPT_URL, $this->getUrl() . $url);

        // Auth
        $credentials = $this->getCredentials();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
        curl_setopt($curl, CURLOPT_USERPWD, $credentials['username'] . ":" . $credentials['password']);

        $result = curl_exec($curl);

        curl_close($curl);

        return $this->parse($result);
    }

    /**
     * Format parameters
     *
     * @param array $params
     * @return array
     */
    protected function formatParameters(array $params)
    {
        $return = [];

        foreach ($params as $key => $val) {
            $return[] = $key . ':' . $val;
        }

        return $return;
    }

    /**
     * Parse API response
     *
     * @param string $result
     * @return array
     * @throws InvalidAPICallException
     */
    public function parse($result)
    {
        $array = json_decode($result, true);

        if (isset($array['errors'])) {
            throw new InvalidAPICallException(
                sprintf(
                    _('Freespee API Error: %s'),
                    json_encode($array['errors'])
                )
            );
        }

        return $array;
    }

    /**
     * Get freespee credentials
     *
     * @return array
     * @throws InvalidCredentialsException
     */
    protected function getCredentials()
    {
        $credentials = [
            'username' => env('FREESPEE_USERNAME'),
            'password' => env('FREESPEE_PASSWORD'),
        ];

        if (is_null($credentials['username']) || is_null($credentials['password'])) {
            throw new InvalidCredentialsException('Please provide your freespee credentials');
        }

        return $credentials;
    }

    /**
     * Get API Url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->config->get('api_url');
    }
}
