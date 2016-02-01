<?php

namespace SpotOnLiveTest\Freespee\Services;

use PHPUnit_Framework_TestCase;
use SpotOnLive\Freespee\Services\FreespeeService;

class FreespeeServiceTest extends PHPUnit_Framework_TestCase
{
    /** @var \SpotOnLive\Freespee\Services\FreespeeService */
    protected $service;

    /** @var \SpotOnLive\Freespee\Options\ApiOptions */
    protected $config;

    /** @var \SpotOnLive\Freespee\Services\CurlServiceInterface */
    protected $curlService;

    protected $apiUrl = 'demoUrl';

    protected $apiUsername = 'demoUsername';

    protected $apiPassword = 'demoPassword';

    public function setUp()
    {
        /** @var \SpotOnLive\Freespee\Options\ApiOptions $config */
        $config = $this->getMock('SpotOnLive\Freespee\Options\ApiOptions');
        $this->config = $config;

        /** @var \SpotOnLive\Freespee\Services\CurlServiceInterface $curlService */
        $curlService = $this->getMock('SpotOnLive\Freespee\Services\CurlServiceInterface');
        $this->curlService = $curlService;

        $service = new \SpotOnLive\Freespee\Services\FreespeeService([
            'api_url' => $this->apiUrl,
            'username' => $this->apiUsername,
            'password' => $this->apiPassword,
        ], $curlService);
        $this->service = $service;

        $this->service->setConfig($config);
    }

    public function testFindAllCustomersNoCustomers()
    {
        $page = 15;

        $customers = [];

        $curlResult = [
            'total' => count($customers),
            'customers' => $customers,
        ];

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($this->apiUrl . '/customers?page=' . $page, $this->apiUsername . ':' . $this->apiPassword)
            ->willReturn(json_encode($curlResult));

        $result = $this->service->findAllCustomers($page);

        $this->assertSame([], $result);
    }

    public function testFindAllCustomersWithCustomer()
    {
        $page = 15;

        $customers = [
            [
                'customer_id' => 1,
                'name' => 'test',
                'custnr' => 2,
                'corporateid' => 3,
                'email' => 'test@test.com',
                'uuid' => '262e3a43-5035-4903-b803-cff8379c6912',
                'receive_monthly_report' => 4,
                'freespee_caller_id' => 5,

                'address_street' => 'street',
                'address_zip' => '1234',
                'address_city' => 'city',
                'address_state' => 'state',
                'address_country' => 'country'
            ]
        ];

        $customer = new \SpotOnLive\Freespee\Models\Customer();
        $customer->setId($customers[0]['customer_id']);
        $customer->setName($customers[0]['name']);
        $customer->setCustomerNumber($customers[0]['custnr']);
        $customer->setCorporateId($customers[0]['corporateid']);
        $customer->setEmail($customers[0]['email']);
        $customer->setUuid($customers[0]['uuid']);
        $customer->setReceiveMonthlyReport((int) $customers[0]['receive_monthly_report']);
        $customer->setFreespeeCallerId($customers[0]['freespee_caller_id']);

        // Address
        $address = new \SpotOnLive\Freespee\Models\CustomerAddress();
        $address->setStreet($customers[0]['address_street']);
        $address->setZip($customers[0]['address_zip']);
        $address->setCity($customers[0]['address_city']);
        $address->setState($customers[0]['address_state']);
        $address->setCountry($customers[0]['address_country']);

        $customer->setAddress($address);

        $curlResult = [
            'total' => count($customers),
            'customers' => $customers,
        ];

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($this->apiUrl . '/customers?page=' . $page, $this->apiUsername . ':' . $this->apiPassword)
            ->willReturn(json_encode($curlResult));

        $result = $this->service->findAllCustomers($page);

        $this->assertEquals([$customer], $result);
    }

    public function testTotalNumberOfCustomers()
    {
        $totalNumber = 143;

        $curlReturn = [
            'total' => $totalNumber,
        ];

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($this->apiUrl . '/customers')
            ->willReturn(json_encode($curlReturn));

        $result = $this->service->getTotalNumberOfCustomers();

        $this->assertSame($totalNumber, $result);
    }

    public function testFindCustomerNoCustomer()
    {
        $customerId = 123;

        $customers = [];

        $curlResult = [
            'total' => count($customers),
            'customers' => $customers,
        ];

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($this->apiUrl . '/customers?customer_id=' . $customerId, $this->apiUsername . ':' . $this->apiPassword)
            ->willReturn(json_encode($curlResult));

        $result = $this->service->findCustomer($customerId);

        $this->assertNull($result);
    }

    public function testFindCustomerWithCustomer()
    {
        $customerId = 123;

        $customers = [
            [
                'customer_id' => 1,
                'name' => 'test',
                'custnr' => 2,
                'corporateid' => 3,
                'email' => 'test@test.com',
                'uuid' => '262e3a43-5035-4903-b803-cff8379c6912',
                'receive_monthly_report' => 4,
                'freespee_caller_id' => 5,

                'address_street' => 'street',
                'address_zip' => '1234',
                'address_city' => 'city',
                'address_state' => 'state',
                'address_country' => 'country'
            ]
        ];

        $customer = new \SpotOnLive\Freespee\Models\Customer();
        $customer->setId($customers[0]['customer_id']);
        $customer->setName($customers[0]['name']);
        $customer->setCustomerNumber($customers[0]['custnr']);
        $customer->setCorporateId($customers[0]['corporateid']);
        $customer->setEmail($customers[0]['email']);
        $customer->setUuid($customers[0]['uuid']);
        $customer->setReceiveMonthlyReport((int) $customers[0]['receive_monthly_report']);
        $customer->setFreespeeCallerId($customers[0]['freespee_caller_id']);

        // Address
        $address = new \SpotOnLive\Freespee\Models\CustomerAddress();
        $address->setStreet($customers[0]['address_street']);
        $address->setZip($customers[0]['address_zip']);
        $address->setCity($customers[0]['address_city']);
        $address->setState($customers[0]['address_state']);
        $address->setCountry($customers[0]['address_country']);

        $customer->setAddress($address);

        $curlResult = [
            'total' => count($customers),
            'customers' => $customers,
        ];

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($this->apiUrl . '/customers?customer_id=' . $customerId, $this->apiUsername . ':' . $this->apiPassword)
            ->willReturn(json_encode($curlResult));

        $result = $this->service->findCustomer($customerId);

        $this->assertEquals($customer, $result);
    }

    public function testFindCallsNoCalls()
    {
        $customerId = 123;

        $calls = [];

        $page = 1;
        $pageSize = 2;
        $numberOfPages = 3;

        $curlResult = [
            'total' => count($calls),
            'page' => $page,
            'pagesize' => $pageSize,
            'numpages' => $numberOfPages,
            'cdrs' => $calls,
        ];

        $expected = [
            'total' => count($calls),
            'page' => $page,
            'pageSize' => $pageSize,
            'numberOfPages' => $numberOfPages,
            'results' => [],
        ];

        /** @var \SpotOnLive\Freespee\Models\Customer $customer */
        $customer = $this->getMock(\SpotOnLive\Freespee\Models\Customer::class);
        $params = [];

        $customer->expects($this->at(0))
            ->method('getId')
            ->willReturn($customerId);

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($this->apiUrl . '/statistics/cdrs?customer_id=' . $customerId, $this->apiUsername . ':' . $this->apiPassword)
            ->willReturn(json_encode($curlResult));

        $result = $this->service->findCalls($customer, $params);

        $this->assertSame($expected, $result);
    }

    public function testFindCallsWithCall()
    {
        $customerId = 123;
        $dateTime = '2015-01-01 00:00:00';

        $calls = [
            [
                'cdr_id' => 1,
                'start' => $dateTime,
                'duration' => 2,
                'duration_adjusted' => 3,
                'anum' => 4,
                'anum_md5' => 'md5',
                'bnum' => 5,
                'cnum' => 6,
                'customer_id' => 123456,
                'source_id' => 789,
                'custnr' => 455,
                'answered' => 1,
                'quarantined' => 0,
                'anum_ndc_name' => 'a name'
            ]
        ];

        $call = new \SpotOnLive\Freespee\Models\Call();
        $call->setCdrId(1);
        $call->setStart(new \DateTime($dateTime));
        $call->setDuration(2);
        $call->setDurationAdjusted(3);
        $call->setAnum(4);
        $call->setAnumMd5('md5');
        $call->setBnum(5);
        $call->setCnum(6);
        $call->setCustomerId(123456);
        $call->setSourceId(789);
        $call->setCustomerNumber(455);
        $call->setAnswered(1);
        $call->setQuarantined(0);
        $call->setAnumNdcName('a name');

        $page = 1;
        $pageSize = 2;
        $numberOfPages = 3;

        $curlResult = [
            'total' => count($calls),
            'page' => $page,
            'pagesize' => $pageSize,
            'numpages' => $numberOfPages,
            'cdrs' => $calls,
        ];

        $expected = [
            'total' => count($calls),
            'page' => $page,
            'pageSize' => $pageSize,
            'numberOfPages' => $numberOfPages,
            'results' => [
                $call
            ],
        ];

        /** @var \SpotOnLive\Freespee\Models\Customer $customer */
        $customer = $this->getMock(\SpotOnLive\Freespee\Models\Customer::class);
        $params = [];

        $customer->expects($this->at(0))
            ->method('getId')
            ->willReturn($customerId);

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($this->apiUrl . '/statistics/cdrs?customer_id=' . $customerId, $this->apiUsername . ':' . $this->apiPassword)
            ->willReturn(json_encode($curlResult));

        $result = $this->service->findCalls($customer, $params);

        $this->assertEquals($expected, $result);
    }

    public function testFindCallsWithExtendedCall()
    {
        $customerId = 123;
        $dateTime = '2015-01-01 00:00:00';

        $calls = [
            [
                'cdr_id' => 1,
                'start' => $dateTime,
                'duration' => 2,
                'duration_adjusted' => 3,
                'anum' => 4,
                'anum_md5' => 'md5',
                'bnum' => 5,
                'cnum' => 6,
                'customer_id' => 123456,
                'source_id' => 789,
                'custnr' => 455,
                'answered' => 1,
                'quarantined' => 0,
                'anum_ndc_name' => 'a name',
                'expire' => '2015-01-01 00:00:00',
                'source_name' => 'test.com',
                'source_media' => 'demo',
                'class' => 0,
                'publisher_id' => 123,
                'partner_publisher_id' => 1234,
                'campaign_id' => 999,
                'partner_campaign_id' => 9999,
                'pricing_model_id' => 20,
                'commission' => 350.00,
                'cli_id' => 1,
                'order_id' => 522,
                'recording_id' => 'd95b3308-ea0f-4db5-a783-a2de0b2f3f2f'
            ]
        ];

        $call = new \SpotOnLive\Freespee\Models\Call();
        $call->setCdrId(1);
        $call->setStart(new \DateTime($dateTime));
        $call->setDuration(2);
        $call->setDurationAdjusted(3);
        $call->setAnum(4);
        $call->setAnumMd5('md5');
        $call->setBnum(5);
        $call->setCnum(6);
        $call->setCustomerId(123456);
        $call->setSourceId(789);
        $call->setCustomerNumber(455);
        $call->setAnswered(1);
        $call->setQuarantined(0);
        $call->setAnumNdcName('a name');
        $call->setExpire(new \DateTime('2015-01-01 00:00:00'));
        $call->setSourceName('test.com');
        $call->setSourceMedia('demo');
        $call->setClass(0);
        $call->setPublisherId(123);
        $call->setPartnerPublisherId(1234);
        $call->setCampaignId(999);
        $call->setPartnerCampaignId(9999);
        $call->setPricingModelId(20);
        $call->setCommission(350.00);
        $call->setCliId(1);
        $call->setOrderId(522);
        $call->setRecordingId('d95b3308-ea0f-4db5-a783-a2de0b2f3f2f');

        $page = 1;
        $pageSize = 2;
        $numberOfPages = 3;

        $curlResult = [
            'total' => count($calls),
            'page' => $page,
            'pagesize' => $pageSize,
            'numpages' => $numberOfPages,
            'cdrs' => $calls,
        ];

        $expected = [
            'total' => count($calls),
            'page' => $page,
            'pageSize' => $pageSize,
            'numberOfPages' => $numberOfPages,
            'results' => [
                $call
            ],
        ];

        /** @var \SpotOnLive\Freespee\Models\Customer $customer */
        $customer = $this->getMock(\SpotOnLive\Freespee\Models\Customer::class);
        $params = [
            'extended' => 1,
        ];

        $customer->expects($this->at(0))
            ->method('getId')
            ->willReturn($customerId);

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($this->apiUrl . '/statistics/cdrs?extended=1&customer_id=' . $customerId, $this->apiUsername . ':' . $this->apiPassword)
            ->willReturn(json_encode($curlResult));

        $result = $this->service->findCalls($customer, $params);

        $this->assertEquals($expected, $result);
    }

    public function testApiNoParameters()
    {
        $url = 'testUrl';

        $params = [];

        $curlResult = ['demo'];

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($this->apiUrl . $url, $this->apiUsername . ':' . $this->apiPassword)
            ->willReturn(json_encode($curlResult));

        $result = $this->service->api($url, $params);

        $this->assertSame($curlResult, $result);
    }

    public function testApiWithParameters()
    {
        $url = 'testUrl';

        $params = [
            'a' => 'b'
        ];

        $curlResult = ['demo'];

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($this->apiUrl . $url . '?a=b', $this->apiUsername . ':' . $this->apiPassword)
            ->willReturn(json_encode($curlResult));

        $result = $this->service->api($url, $params);

        $this->assertSame($curlResult, $result);
    }

    public function testFormatParameters()
    {
        $params = [
            'a' => 'b',
            'c' => 'd',
        ];

        $expected = [
            'a:b',
            'c:d'
        ];

        $result = $this->service->formatParameters($params);

        $this->assertSame($expected, $result);
    }

    public function testParseErrorException()
    {
        $array = [
            'errors' => 'someErrors'
        ];

        $this->setExpectedException(
            \SpotOnLive\Freespee\Exceptions\InvalidAPICallException::class,
            sprintf(
                'Freespee API Error: %s',
                json_encode($array['errors'])
            )
        );

        $this->service->parse(json_encode($array));
    }

    public function testParse()
    {
        $array = [
            'a' => 'b'
        ];

        $result = $this->service->parse(json_encode($array));

        $this->assertSame($array, $result);
    }

    public function testGetUrl()
    {
        $result = $this->service->getApiUrl();
        $this->assertSame($this->apiUrl, $result);
    }

    public function testSetUrl()
    {
        $newApiUrl = 'new demo api url';

        $this->service->setApiUrl($newApiUrl);
        $result = $this->service->getApiUrl();

        $this->assertSame($newApiUrl, $result);
    }

    public function testSetConfig()
    {
        /** @var \SpotOnLive\Freespee\Options\OptionsInterface $newConfig */
        $newConfig = $this->getMock('SpotOnLive\Freespee\Options\Options');

        $this->service->setConfig($newConfig);

        $result = $this->service->getConfig();

        $this->assertSame($newConfig, $result);
    }

    public function testSetCredentials()
    {
        $credentials = [
            'username' => 'test-username',
            'password' => 'test-password',
        ];

        /** @var FreespeeService $service */
        $service = new $this->service([], $this->curlService);

        $class = new \ReflectionClass(get_class($service));

        $matchCredentials = $class->getMethod('getCredentials');
        $matchCredentials->setAccessible(true);

        $service->setCredentials($credentials['username'], $credentials['password']);

        $this->assertSame(
            $credentials,
            $matchCredentials->invoke($service)
        );
    }
}
