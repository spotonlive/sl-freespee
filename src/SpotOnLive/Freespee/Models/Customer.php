<?php

namespace SpotOnLive\Freespee\Models;

class Customer implements CustomerInterface
{
    /**
     * @var integer Freespee's unique ID for customer.
     */
    protected $id;

    /**
     * @var string Customer name.
     */
    protected $name;

    /**
     * @var string Partners unique customer number / ID.
     */
    protected $customerNumber;

    /**
     * @var string Customer corporate number / ID, e.g. VAT-number.
     */
    protected $corporateId;

    /**
     * @var string Customer email address.
     */
    protected $email;

    /**
     * @var string Customer unique ID.
     */
    protected $uuid;

    /**
     * @var string Customer custom field value where N between 1 and 20, 255 characters.
     */
    protected $customerN;

    /**
     * @var integer Customer to receive monthly report, 0=no report, 1=extended, 2=short.
     */
    protected $receiveMonthlyReport;

    /**
     * @var integer Customer to receive Freespee number as CLI, 1=true, 0=false.
     */
    protected $freespeeCallerId;

    /**
     * @var CustomerAddress
     */
    protected $address;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCustomerNumber()
    {
        return $this->customerNumber;
    }

    /**
     * @param string $customerNumber
     */
    public function setCustomerNumber($customerNumber)
    {
        $this->customerNumber = $customerNumber;
    }

    /**
     * @return string
     */
    public function getCorporateId()
    {
        return $this->corporateId;
    }

    /**
     * @param string $corporateId
     */
    public function setCorporateId($corporateId)
    {
        $this->corporateId = $corporateId;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function getCustomerN()
    {
        return $this->customerN;
    }

    /**
     * @param string $customerN
     */
    public function setCustomerN($customerN)
    {
        $this->customerN = $customerN;
    }

    /**
     * @return int
     */
    public function getReceiveMonthlyReport()
    {
        return $this->receiveMonthlyReport;
    }

    /**
     * @param int $receiveMonthlyReport
     */
    public function setReceiveMonthlyReport($receiveMonthlyReport)
    {
        $this->receiveMonthlyReport = $receiveMonthlyReport;
    }

    /**
     * @return int
     */
    public function getFreespeeCallerId()
    {
        return $this->freespeeCallerId;
    }

    /**
     * @param int $freespeeCallerId
     */
    public function setFreespeeCallerId($freespeeCallerId)
    {
        $this->freespeeCallerId = $freespeeCallerId;
    }

    /**
     * @return CustomerAddress
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param CustomerAddress $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }
}
