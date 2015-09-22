<?php

namespace SpotOnLive\Freespee\Services;

use SpotOnLive\Freespee\Exceptions\InvalidAPICallException;
use SpotOnLive\Freespee\Exceptions\InvalidCredentialsException;
use SpotOnLive\Freespee\Exceptions\InvalidAreaException;
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

    public function findAllCustomers()
    {
        $customers = $this->api('/customers');
    }

    /**
     * Call API
     *
     * @param string $url
     * @param array $params
     * @return array
     * @throws InvalidCredentialsException
     */
    public function api($url, array $params = [])
    {
        // Curl
        $curl = curl_init();

        // Type
        curl_setopt($curl, CURLOPT_URL, $this->getUrl() . $url);

        // Auth
        $credentials = $this->getCredentials();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
        curl_setopt($curl, CURLOPT_USERPWD, $credentials['username'] . ":" . $credentials['password']);

        // Parameters
        curl_setopt($curl, CURLOPT_HTTPHEADER, $params);

        $result = curl_exec($curl);

        return $this->parse($result);
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
