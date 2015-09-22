<?php

namespace SpotOnLive\Freespee\Models;

class Call
{
    /**
     * @var integer
     */
    protected $cdrId;

    /**
     * @var \DateTime
     */
    protected $start;

    /**
     * @var integer
     */
    protected $duration;

    /**
     * @var integer
     */
    protected $durationAdjusted;

    /**
     * @var string
     */
    protected $anum;

    /**
     * @var string
     */
    protected $anumMd5;

    /**
     * @var string
     */
    protected $bnum;

    /**
     * @var string
     */
    protected $cnum;

    /**
     * @var integer
     */
    protected $customerId;

    /**
     * @var integer
     */
    protected $sourceId;

    /**
     * @var integer
     */
    protected $customerNumber;

    /**
     * @var integer
     */
    protected $answered;

    /**
     * @var integer
     */
    protected $quarantined;

    /**
     * @var string
     */
    protected $anumNdcName;

    /**
     * @return int
     */
    public function getCdrId()
    {
        return $this->cdrId;
    }

    /**
     * @param int $cdrId
     */
    public function setCdrId($cdrId)
    {
        $this->cdrId = $cdrId;
    }

    /**
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param \DateTime $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return int
     */
    public function getDurationAdjusted()
    {
        return $this->durationAdjusted;
    }

    /**
     * @param int $durationAdjusted
     */
    public function setDurationAdjusted($durationAdjusted)
    {
        $this->durationAdjusted = $durationAdjusted;
    }

    /**
     * @return string
     */
    public function getAnum()
    {
        return $this->anum;
    }

    /**
     * @param string $anum
     */
    public function setAnum($anum)
    {
        $this->anum = $anum;
    }

    /**
     * @return string
     */
    public function getAnumMd5()
    {
        return $this->anumMd5;
    }

    /**
     * @param string $anumMd5
     */
    public function setAnumMd5($anumMd5)
    {
        $this->anumMd5 = $anumMd5;
    }

    /**
     * @return string
     */
    public function getBnum()
    {
        return $this->bnum;
    }

    /**
     * @param string $bnum
     */
    public function setBnum($bnum)
    {
        $this->bnum = $bnum;
    }

    /**
     * @return string
     */
    public function getCnum()
    {
        return $this->cnum;
    }

    /**
     * @param string $cnum
     */
    public function setCnum($cnum)
    {
        $this->cnum = $cnum;
    }

    /**
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * @return int
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * @param int $sourceId
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
    }

    /**
     * @return int
     */
    public function getCustomerNumber()
    {
        return $this->customerNumber;
    }

    /**
     * @param int $customerNumber
     */
    public function setCustomerNumber($customerNumber)
    {
        $this->customerNumber = $customerNumber;
    }

    /**
     * @return int
     */
    public function getAnswered()
    {
        return $this->answered;
    }

    /**
     * @param int $answered
     */
    public function setAnswered($answered)
    {
        $this->answered = $answered;
    }

    /**
     * @return int
     */
    public function getQuarantined()
    {
        return $this->quarantined;
    }

    /**
     * @param int $quarantined
     */
    public function setQuarantined($quarantined)
    {
        $this->quarantined = $quarantined;
    }

    /**
     * @return string
     */
    public function getAnumNdcName()
    {
        return $this->anumNdcName;
    }

    /**
     * @param string $anumNdcName
     */
    public function setAnumNdcName($anumNdcName)
    {
        $this->anumNdcName = $anumNdcName;
    }
}
