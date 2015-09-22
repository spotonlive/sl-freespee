<?php

namespace SpotOnLive\Freespee\Services;

use SpotOnLive\Freespee\Models\CustomerInterface;

interface FreespeeServiceInterface
{
    /**
     * Call API
     *
     * @param string $url
     * @param array $params
     * @return array
     */
    public function api($url, array $params = []);

    /**
     * Find customers
     *
     * @param int $page
     * @return array|CustomerInterface[]
     */
    public function findAllCustomers($page = 0);

    /**
     * Get total number of customers
     *
     * @return integer
     */
    public function getTotalNumberOfCustomers();

    /**
     * Find customer
     *
     * @param integer $id
     * @return \SpotOnLive\Freespee\Models\Customer|null
     */
    public function findCustomer($id);

    /**
     * Find calls
     *
     * @param CustomerInterface $customer
     * @param array $params
     * @return array
     */
    public function findCalls(CustomerInterface $customer, $params = []);
}
