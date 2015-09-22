<?php

namespace SpotOnLive\Freespee\Services;

interface FreespeeServiceInterface
{
    /**
     * Call API
     *
     * @param string $type
     * @param null $identifier
     * @param array $params
     * @return array
     */
    public function api($type, $identifier = null, array $params = []);
}