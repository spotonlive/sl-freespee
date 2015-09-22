<?php

namespace SpotOnLive\Freespee\Services;

interface FreespeeServiceInterface
{
    /**
     * Call API
     *
     * @param string $url
     * @param array $params
     * @return mixed
     */
    public function api($url, array $params = []);
}
