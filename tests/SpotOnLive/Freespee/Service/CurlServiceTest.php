<?php

namespace SpotOnLiveTest\Freespee\Services;

use PHPUnit_Framework_TestCase;

class CurlServiceTest extends PHPUnit_Framework_TestCase
{
    /** @var \SpotOnLive\Freespee\Services\CurlService */
    protected $service;

    /** @var \SpotOnLive\Freespee\Options\ApiOptions */
    protected $config;

    /** @var \SpotOnLive\Freespee\Services\CurlServiceInterface */
    protected $curlService;

    public function setUp()
    {
        $service = new \SpotOnLive\Freespee\Services\CurlService();
        $this->service = $service;
    }
}
