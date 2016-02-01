<?php

namespace SpotOnLive\Freespee\Options;

class ApiOptions extends Options implements OptionsInterface
{
    /** @var array */
    protected $defaults = [
        'api_url' => null,

        'username' => null,
        'password' => null,
    ];
}
