<?php

namespace SpotOnLive\Freespee\Services;

use SpotOnLive\Freespee\Exceptions\InvalidTypeException;
use SpotOnLive\Freespee\Options\ApiOptions;

class FreespeeService implements FreespeeServiceInterface
{
    /** @var ApiOptions */
    protected $config;

    protected $allowedTypes = [
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
     * @param string $type
     * @param null $identifier
     * @param array $params
     * @return mixed
     * @throws InvalidTypeException
     */
    public function api($type, $identifier = null, array $params = [])
    {
        $this->validateType($type);

        // Url
        $url = $this->getUrl() . '/' . $type;

        if ($identifier) {
            $url .= '/' . $identifier;
        }

        // Curl
        $curl = curl_init();

        // Type
        curl_setopt($curl, CURLOPT_URL, $url);

        // Auth
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
        curl_setopt($curl, CURLOPT_USERPWD, env('FREESPEE_USERNAME') . ":" . env('FREESPEE_PASSWORD'));

        // Parameters
        curl_setopt($curl, CURLOPT_HTTPHEADER, $params);

        $result = curl_exec($curl);

        return json_decode($result);
    }

    /**
     * Validate API type
     *
     * @param string $type
     * @return bool
     * @throws InvalidTypeException
     */
    public function validateType($type)
    {
        if (!in_array($type, $this->getAllowedTypes())) {
            throw new InvalidTypeException(
                sprintf(
                    _('The API type "%s" is not allowed'),
                    $type
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
     * Set allowed API types
     *
     * @param array $allowedTypes
     */
    public function setAllowedTypes(array $allowedTypes)
    {
        $this->allowedTypes = $allowedTypes;
    }

    /**
     * Get allowed types
     *
     * @return array
     */
    protected function getAllowedTypes()
    {
        return $this->allowedTypes;
    }
}