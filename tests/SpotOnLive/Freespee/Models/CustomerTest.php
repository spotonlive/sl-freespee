<?php

namespace SpotOnLiveTest\Freespee\Models;

use PHPUnit_Framework_TestCase;

class CustomerTest extends PHPUnit_Framework_TestCase
{
    /** @var \SpotOnLive\Freespee\Models\Customer */
    protected $model;

    public function setUp()
    {
        $model = new \SpotOnLive\Freespee\Models\Customer;
        $this->model = $model;
    }

    public function testId()
    {
        $value = 'tester1';
        $this->model->setId($value);

        $result = $this->model->getId();

        $this->assertSame($value, $result);
    }

    public function testName()
    {
        $value = 'tester2';
        $this->model->setName($value);

        $result = $this->model->getName();

        $this->assertSame($value, $result);
    }

    public function testCustomerNumber()
    {
        $value = 'tester3';
        $this->model->setCustomerNumber($value);

        $result = $this->model->getCustomerNumber();

        $this->assertSame($value, $result);
    }

    public function testCorporateId()
    {
        $value = 'tester4';
        $this->model->setCorporateId($value);

        $result = $this->model->getCorporateId();

        $this->assertSame($value, $result);
    }

    public function testEmail()
    {
        $value = 'tester5';
        $this->model->setEmail($value);

        $result = $this->model->getEmail();

        $this->assertSame($value, $result);
    }

    public function testUuid()
    {
        $value = 'tester6';
        $this->model->setUuid($value);

        $result = $this->model->getUuid();

        $this->assertSame($value, $result);
    }

    public function testCustomerN()
    {
        $value = 'tester7';
        $this->model->setCustomerN($value);

        $result = $this->model->getCustomerN();

        $this->assertSame($value, $result);
    }

    public function testReceiveMonthlyReport()
    {
        $value = 'tester8';
        $this->model->setReceiveMonthlyReport($value);

        $result = $this->model->getReceiveMonthlyReport();

        $this->assertSame($value, $result);
    }

    public function testFreespeeCallerId()
    {
        $value = 'tester9';
        $this->model->setFreespeeCallerId($value);

        $result = $this->model->getFreespeeCallerId();

        $this->assertSame($value, $result);
    }

    public function testAddress()
    {
        $value = new \SpotOnLive\Freespee\Models\CustomerAddress();
        $this->model->setAddress($value);

        $result = $this->model->getAddress();

        $this->assertSame($value, $result);
    }
}
