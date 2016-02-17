<?php

return [
    /*
     * Freespee API url
     *
     * https://api.[server].freespee.com/[api-version]
     * Ex. https://api.analytics2.freespee.com/2.4.0
     */
    'api_url' => env('FREESPEE_API_URL', null),

    /*
     * Freespee credentials
     */
    'username' => env('FREESPEE_USERNAME', null),
    'password' => env('FREESPEE_PASSWORD', null),
];
