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

    public function testExpire()
    {
        $value = new \DateTime;
        $this->model->setExpire($value);

        $result = $this->model->getExpire();

        $this->assertSame($value, $result);
    }

    public function testSourceTimestamp()
    {
        $value = new \DateTime;
        $this->model->setSourceTimestamp($value);

        $result = $this->model->getSourceTimestamp();

        $this->assertSame($value, $result);
    }

    public function testSourceName()
    {
        $value = 'tester13';
        $this->model->setSourceName($value);

        $result = $this->model->getSourceName();

        $this->assertSame($value, $result);
    }

    public function testSourceMedia()
    {
        $value = 'tester14';
        $this->model->setSourceMedia($value);

        $result = $this->model->getSourceMedia();

        $this->assertSame($value, $result);
    }

    public function testClass()
    {
        $value = 15;
        $this->model->setClass($value);

        $result = $this->model->getClass();

        $this->assertSame($value, $result);
    }

    public function testPublisherId()
    {
        $value = 16;
        $this->model->setPublisherId($value);

        $result = $this->model->getPublisherId();

        $this->assertSame($value, $result);
    }

    public function testPartnerPublisherId()
    {
        $value = 16;
        $this->model->setPartnerPublisherId($value);

        $result = $this->model->getPartnerPublisherId();

        $this->assertSame($value, $result);
    }

    public function testCampaignId()
    {
        $value = 17;
        $this->model->setCampaignId($value);

        $result = $this->model->getCampaignId();

        $this->assertSame($value, $result);
    }

    public function testPartnerCampaignId()
    {
        $value = 17;
        $this->model->setPartnerCampaignId($value);

        $result = $this->model->getPartnerCampaignId();

        $this->assertSame($value, $result);
    }

    public function testPricingModelId()
    {
        $value = 500;
        $this->model->setPricingModelId($value);

        $result = $this->model->getPricingModelId();

        $this->assertSame($value, $result);
    }

    public function testCommission()
    {
        $value = 350.00;
        $this->model->setCommission($value);

        $result = $this->model->getCommission();

        $this->assertSame($value, $result);
    }

    public function testCliId()
    {
        $value = 18;
        $this->model->setCliId($value);

        $result = $this->model->getCliId();

        $this->assertSame($value, $result);
    }

    public function testOrderId()
    {
        $value = 18;
        $this->model->setOrderId($value);

        $result = $this->model->getOrderId();

        $this->assertSame($value, $result);
    }

    public function testRecordingId()
    {
        $value = '17e1e262-be4c-4819-958f-9032285311ce';
        $this->model->setRecordingId($value);

        $result = $this->model->getRecordingId();

        $this->assertSame($value, $result);
    }
}
