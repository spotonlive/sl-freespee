<?php

namespace SpotOnLive\Freespee\Options;

class ApiOptions extends Options implements OptionsInterface
{
    /** @var array */
    protected $defaults = [
        'api_url' => 'https://api.analytics2.freespee.com/2.4.0',
    ];
}
