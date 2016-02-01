<?php

namespace SpotOnLiveTest\Freespee\Options;

use PHPUnit_Framework_TestCase;

class ApiOptionsTest extends PHPUnit_Framework_TestCase
{
    /** @var \SpotOnLive\Freespee\Options\ApiOptions */
    protected $options;

    protected $defaults = [
        'api_url' => null,
        'username' => null,
        'password' => null,
    ];

    protected $demoOptions = [
        'a' => 'b',
    ];

    public function setUp()
    {
        $options = new \SpotOnLive\Freespee\Options\ApiOptions($this->demoOptions);
        $this->options = $options;
    }

    public function testGetDefaults()
    {
        $result = $this->options->getDefaults();

        $this->assertSame($this->defaults, $result);
    }

    public function testSetDefaults()
    {
        $defaults = [
            'a' => 'b'
        ];

        $this->options->setDefaults($defaults);
        $result = $this->options->getDefaults();

        $this->assertSame($defaults, $result);
    }

    public function testGetOptions()
    {
        $options = [
            'api_url' => null,
            'username' => null,
            'password' => null,
            'a' => 'b'
        ];

        $result = $this->options->getOptions();

        $this->assertSame($options, $result);
    }

    public function testSetOptions()
    {
        $newOptions = [
            'username' => null,
            'password' => null,
        ];

        $this->options->setOptions($newOptions);

        $result = $this->options->getOptions();

        $this->assertSame($newOptions, $result);
    }

    public function testGetOfNotExistingEntry()
    {
        $key = 'non-existing';

        $result = $this->options->get($key);

        $this->assertNull($result);
    }

    public function testGet()
    {
        $key = 'a';

        $result = $this->options->get($key);

        $this->assertSame($this->demoOptions[$key], $result);
    }
}
