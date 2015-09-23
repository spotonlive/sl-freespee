<?php

namespace SpotOnLiveTest\Freespee\Models;

use PHPUnit_Framework_TestCase;

class CallTest extends PHPUnit_Framework_TestCase
{
    /** @var \SpotOnLive\Freespee\Models\Call */
    protected $model;

    public function setUp()
    {
        $model = new \SpotOnLive\Freespee\Models\Call;
        $this->model = $model;
    }

    public function testCdrId()
    {
        $value = 'tester1';
        $this->model->setCdrId($value);

        $result = $this->model->getCdrId();

        $this->assertSame($value, $result);
    }

    public function testStart()
    {
        $value = new \DateTime();
        $this->model->setStart($value);

        $result = $this->model->getStart();

        $this->assertSame($value, $result);
    }

    public function testDuration()
    {
        $value = 'tester2';
        $this->model->setDuration($value);

        $result = $this->model->getDuration();

        $this->assertSame($value, $result);
    }

    public function testDurationAdjusted()
    {
        $value = 'tester3';
        $this->model->setDurationAdjusted($value);

        $result = $this->model->getDurationAdjusted();

        $this->assertSame($value, $result);
    }

    public function testAnum()
    {
        $value = 'tester4';
        $this->model->setAnum($value);

        $result = $this->model->getAnum();

        $this->assertSame($value, $result);
    }

    public function testAnumMd5()
    {
        $value = 'md5';
        $this->model->setAnumMd5($value);

        $result = $this->model->getAnumMd5();

        $this->assertSame($value, $result);
    }

    public function testBnum()
    {
        $value = 'tester5';
        $this->model->setBnum($value);

        $result = $this->model->getBnum();

        $this->assertSame($value, $result);
    }

    public function testCnum()
    {
        $value = 'tester6';
        $this->model->setCnum($value);

        $result = $this->model->getCnum();

        $this->assertSame($value, $result);
    }

    public function testCustomerId()
    {
        $value = 'tester7';
        $this->model->setCustomerId($value);

        $result = $this->model->getCustomerId();

        $this->assertSame($value, $result);
    }

    public function testSourceId()
    {
        $value = 'tester8';
        $this->model->setSourceId($value);

        $result = $this->model->getSourceId();

        $this->assertSame($value, $result);
    }

    public function testCustomerNumber()
    {
        $value = 'tester9';
        $this->model->setCustomerNumber($value);

        $result = $this->model->getCustomerNumber();

        $this->assertSame($value, $result);
    }

    public function testAnswered()
    {
        $value = 'tester10';
        $this->model->setAnswered($value);

        $result = $this->model->getAnswered();

        $this->assertSame($value, $result);
    }

    public function testQuarantined()
    {
        $value = 'tester11';
        $this->model->setQuarantined($value);

        $result = $this->model->getQuarantined();

        $this->assertSame($value, $result);
    }

    public function testAnumNdcName()
    {
        $value = 'tester12';
        $this->model->setAnumNdcName($value);

        $result = $this->model->getAnumNdcName();

        $this->assertSame($value, $result);
    }
}
