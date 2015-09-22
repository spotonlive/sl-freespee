<?php

namespace SpotOnLive\Freespee\Services;

use SpotOnLive\Freespee\Exceptions\InvalidCredentialsException;
use SpotOnLive\Freespee\Exceptions\InvalidAreaException;
use SpotOnLive\Freespee\Options\ApiOptions;

class FreespeeService implements FreespeeServiceInterface
{
    /** @var ApiOptions */
    protected $config;

    protected $allowedArea = [
        'customers',
    ];

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = new ApiOptions($config);
    }

    /**
     * Call API
     *
     * @param string $area
     * @param null $identifier
     * @param array $params
     * @return array
     * @throws InvalidAreaException
     */
    public function api($area, $identifier = null, array $params = [])
    {
        $this->validateArea($area);

        // Url
        $url = $this->getUrl() . '/' . $area;

        if ($identifier) {
            $url .= '/' . $identifier;
        }

        // Curl
        $curl = curl_init();

        // Type
        curl_setopt($curl, CURLOPT_URL, $url);

        // Auth
        $credentials = $this->getCredentials();

        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
        curl_setopt($curl, CURLOPT_USERPWD, $credentials['username'] . ":" . $credentials['password']);

        // Parameters
        curl_setopt($curl, CURLOPT_HTTPHEADER, $params);

        $result = curl_exec($curl);

        return json_decode($result);
    }

    /**
     * Get freespee credentials
     *
     * @return array
     * @throws InvalidCredentialsException
     */
    protected function getCredentials()
    {
        $credentials = [
            'username' => env('FREESPEE_USERNAME'),
            'password' => env('FREESPEE_PASSWORD'),
        ];

        if (is_null($credentials['username']) || is_null($credentials['password'])) {
            throw new InvalidCredentialsException('Please provide your freespee credentials');
        }

        return $credentials;
    }

    /**
     * Validate API area
     *
     * @param string $area
     * @return bool
     * @throws InvalidTypeException
     */
    public function validateArea($area)
    {
        if (!in_array($area, $this->getAllowedAreas())) {
            throw new InvalidAreaException(
                sprintf(
                    _('The API area "%s" is not allowed'),
                    $area
                )
            );
        }

        return true;
    }

    /**
     * Get API Url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->config->get('api_url');
    }

    /**
     * Set allowed API areas
     *
     * @param array $allowedAreas
     */
    public function setAllowedAreas(array $allowedAreas)
    {
        $this->allowedAreas = $allowedAreas;
    }

    /**
     * Get allowed areas
     *
     * @return array
     */
    protected function getAllowedAreas()
    {
        return $this->allowedAreas;
    }
}