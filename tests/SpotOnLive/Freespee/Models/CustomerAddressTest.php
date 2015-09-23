<?php

namespace SpotOnLiveTest\Freespee\Models;

use PHPUnit_Framework_TestCase;

class CustomerAddressTest extends PHPUnit_Framework_TestCase
{
    /** @var \SpotOnLive\Freespee\Models\CustomerAddress */
    protected $model;

    public function setUp()
    {
        $model = new \SpotOnLive\Freespee\Models\CustomerAddress;
        $this->model = $model;
    }

    public function testStreet()
    {
        $value = 'tester1';
        $this->model->setStreet($value);

        $result = $this->model->getStreet();

        $this->assertSame($value, $result);
    }

    public function testZip()
    {
        $value = 'tester2';
        $this->model->setZip($value);

        $result = $this->model->getZip();

        $this->assertSame($value, $result);
    }

    public function testCity()
    {
        $value = 'tester3';
        $this->model->setCity($value);

        $result = $this->model->getCity();

        $this->assertSame($value, $result);
    }

    public function testState()
    {
        $value = 'tester4';
        $this->model->setState($value);

        $result = $this->model->getState();

        $this->assertSame($value, $result);
    }

    public function testCountry()
    {
        $value = 'tester5';
        $this->model->setCountry($value);

        $result = $this->model->getCountry();

        $this->assertSame($value, $result);
    }
}
