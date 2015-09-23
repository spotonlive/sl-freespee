<?php

namespace SpotOnLiveTest\Freespee\Services;

use PHPUnit_Framework_TestCase;

class FreespeeServiceTest extends PHPUnit_Framework_TestCase
{
    /** @var \SpotOnLive\Freespee\Services\FreespeeService */
    protected $service;

    /** @var \SpotOnLive\Freespee\Options\ApiOptions */
    protected $config;

    /** @var \SpotOnLive\Freespee\Services\CurlServiceInterface */
    protected $curlService;

    public function setUp()
    {
        /** @var \SpotOnLive\Freespee\Options\ApiOptions $config */
        $config = $this->getMock('SpotOnLive\Freespee\Options\ApiOptions');
        $this->config = $config;

        /** @var \SpotOnLive\Freespee\Services\CurlServiceInterface $curlService */
        $curlService = $this->getMock('SpotOnLive\Freespee\Services\CurlServiceInterface');
        $this->curlService = $curlService;

        $service = new \SpotOnLive\Freespee\Services\FreespeeService([], $curlService);
        $this->service = $service;

        $this->service->setConfig($config);
    }

    public function testFindAllCustomersNoCustomers()
    {
        $apiUrl = 'demoUrl';
        $page = 15;

        $customers = [];

        $curlResult = [
            'total' => count($customers),
            'customers' => $customers,
        ];

        $this->config->expects($this->at(0))
            ->method('get')
            ->with('api_url')
            ->willReturn($apiUrl);

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($apiUrl . '/customers?page=' . $page, 'user:pass')
            ->willReturn(json_encode($curlResult));

        $result = $this->service->findAllCustomers($page);

        $this->assertSame([], $result);
    }

    public function testFindAllCustomersWithCustomer()
    {
        $apiUrl = 'demoUrl';
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

        $this->config->expects($this->at(0))
            ->method('get')
            ->with('api_url')
            ->willReturn($apiUrl);

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($apiUrl . '/customers?page=' . $page, 'user:pass')
            ->willReturn(json_encode($curlResult));

        $result = $this->service->findAllCustomers($page);

        $this->assertEquals([$customer], $result);
    }

    public function testTotalNumberOfCustomers()
    {
        $totalNumber = 143;
        $apiUrl = 'apiUrl';

        $curlReturn = [
            'total' => $totalNumber,
        ];

        $this->config->expects($this->at(0))
            ->method('get')
            ->with('api_url')
            ->willReturn($apiUrl);

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($apiUrl . '/customers')
            ->willReturn(json_encode($curlReturn));

        $result = $this->service->getTotalNumberOfCustomers();

        $this->assertSame($totalNumber, $result);
    }

    public function testFindCustomerNoCustomer()
    {
        $apiUrl = 'demoUrl';
        $customerId = 123;

        $customers = [];

        $curlResult = [
            'total' => count($customers),
            'customers' => $customers,
        ];

        $this->config->expects($this->at(0))
            ->method('get')
            ->with('api_url')
            ->willReturn($apiUrl);

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($apiUrl . '/customers?customer_id=' . $customerId, 'user:pass')
            ->willReturn(json_encode($curlResult));

        $result = $this->service->findCustomer($customerId);

        $this->assertNull($result);
    }

    public function testFindCustomerWithCustomer()
    {
        $apiUrl = 'demoUrl';
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

        $this->config->expects($this->at(0))
            ->method('get')
            ->with('api_url')
            ->willReturn($apiUrl);

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($apiUrl . '/customers?customer_id=' . $customerId, 'user:pass')
            ->willReturn(json_encode($curlResult));

        $result = $this->service->findCustomer($customerId);

        $this->assertEquals($customer, $result);
    }

    public function testFindCallsNoCalls()
    {
        $customerId = 123;
        $apiUrl = 'testUrl';

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
        $customer = $this->getMock('SpotOnLive\Freespee\Models\Customer');
        $params = [];

        $this->config->expects($this->at(0))
            ->method('get')
            ->with('api_url')
            ->willReturn($apiUrl);

        $customer->expects($this->at(0))
            ->method('getId')
            ->willReturn($customerId);

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($apiUrl . '/statistics/cdrs?customer_id=' . $customerId, 'user:pass')
            ->willReturn(json_encode($curlResult));

        $result = $this->service->findCalls($customer, $params);

        $this->assertSame($expected, $result);
    }

    public function testFindCallsWithCall()
    {
        $customerId = 123;
        $apiUrl = 'testUrl';
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
        $customer = $this->getMock('SpotOnLive\Freespee\Models\Customer');
        $params = [];

        $this->config->expects($this->at(0))
            ->method('get')
            ->with('api_url')
            ->willReturn($apiUrl);

        $customer->expects($this->at(0))
            ->method('getId')
            ->willReturn($customerId);

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($apiUrl . '/statistics/cdrs?customer_id=' . $customerId, 'user:pass')
            ->willReturn(json_encode($curlResult));

        $result = $this->service->findCalls($customer, $params);

        $this->assertEquals($expected, $result);
    }

    public function testApiNoParameters()
    {
        $url = 'testUrl';

        $params = [
        ];

        $apiUrl = 'demoApiUrl';

        $curlResult = ['demo'];

        $this->config->expects($this->at(0))
            ->method('get')
            ->with('api_url')
            ->willReturn($apiUrl);

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($apiUrl . $url, 'user:pass')
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

        $apiUrl = 'demoApiUrl';

        $curlResult = ['demo'];

        $this->config->expects($this->at(0))
            ->method('get')
            ->with('api_url')
            ->willReturn($apiUrl);

        $this->curlService->expects($this->at(0))
            ->method('curl')
            ->with($apiUrl . $url . '?a=b', 'user:pass')
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
            '\SpotOnLive\Freespee\Exceptions\InvalidAPICallException',
            sprintf(
                'Freespee API Error: %s',
                json_encode($array['errors'])
            )
        );

        $result = $this->service->parse(json_encode($array));
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
        $apiUrl = 'apiUrl';

        $this->config->expects($this->at(0))
            ->method('get')
            ->with('api_url')
            ->willReturn($apiUrl);

        $result = $this->service->getUrl();

        $this->assertSame($apiUrl, $result);
    }

    public function testSetConfig()
    {
        $newConfig = $this->getMock('SpotOnLive\Freespee\Options\Options');
        $this->service->setConfig($newConfig);

        $result = $this->service->getConfig();

        $this->assertSame($newConfig, $result);
    }
}
