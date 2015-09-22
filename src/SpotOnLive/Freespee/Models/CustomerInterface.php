<?php

namespace SpotOnLive\Freespee\Models;

interface CustomerInterface
{
    /**
     * @return integer
     */
    public function getId();

    /**
     * @param int $id
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getCustomerNumber();

    /**
     * @param string $customerNumber
     */
    public function setCustomerNumber($customerNumber);

    /**
     * @return string
     */
    public function getCorporateId();

    /**
     * @param string $corporateId
     */
    public function setCorporateId($corporateId);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     */
    public function setEmail($email);

    /**
     * @return string
     */
    public function getUuid();

    /**
     * @param string $uuid
     */
    public function setUuid($uuid);

    /**
     * @return string
     */
    public function getCustomerN();

    /**
     * @param string $customerN
     */
    public function setCustomerN($customerN);

    /**
     * @return int
     */
    public function getReceiveMonthlyReport();

    /**
     * @param int $receiveMonthlyReport
     */
    public function setReceiveMonthlyReport($receiveMonthlyReport);

    /**
     * @return int
     */
    public function getFreespeeCallerId();

    /**
     * @param int $freespeeCallerId
     */
    public function setFreespeeCallerId($freespeeCallerId);

    /**
     * @return CustomerAddress
     */
    public function getAddress();

    /**
     * @param CustomerAddress $address
     */
    public function setAddress($address);
}
