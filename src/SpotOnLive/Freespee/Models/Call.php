<?php

namespace SpotOnLive\Freespee\Models;

class Call implements CallInterface
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
     * @var \DateTime|null
     */
    protected $expire = null;

    /**
     * @var \DateTime|null
     */
    protected $sourceTimestamp = null;

    /**
     * @var string|null
     */
    protected $sourceName = null;

    /**
     * @var string|null
     */
    protected $sourceMedia = null;

    /**
     * @var integer|null
     */
    protected $class = null;

    /**
     * @var integer|null
     */
    protected $publisherId = null;

    /**
     * @var integer|null
     */
    protected $partnerPublisherId = null;

    /**
     * @var integer|null
     */
    protected $campaignId = null;

    /**
     * @var integer|null
     */
    protected $partnerCampaignId = null;

    /**
     * @var integer|null
     */
    protected $pricingModelId = null;

    /**
     * @var float|null
     */
    protected $commission = null;

    /**
     * @var integer|null
     */
    protected $cliId = null;

    /**
     * @var integer|null
     */
    protected $orderId = null;

    /**
     * @var string|null
     */
    protected $recordingId = null;

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

    /**
     * @return \DateTime|null
     */
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * @param \DateTime|null $expire
     */
    public function setExpire($expire)
    {
        $this->expire = $expire;
    }

    /**
     * @return \DateTime|null
     */
    public function getSourceTimestamp()
    {
        return $this->sourceTimestamp;
    }

    /**
     * @param \DateTime|null $sourceTimestamp
     */
    public function setSourceTimestamp($sourceTimestamp)
    {
        $this->sourceTimestamp = $sourceTimestamp;
    }

    /**
     * @return null|string
     */
    public function getSourceName()
    {
        return $this->sourceName;
    }

    /**
     * @param null|string $sourceName
     */
    public function setSourceName($sourceName)
    {
        $this->sourceName = $sourceName;
    }

    /**
     * @return null|string
     */
    public function getSourceMedia()
    {
        return $this->sourceMedia;
    }

    /**
     * @param null|string $sourceMedia
     */
    public function setSourceMedia($sourceMedia)
    {
        $this->sourceMedia = $sourceMedia;
    }

    /**
     * @return int|null
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param int|null $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return int|null
     */
    public function getPublisherId()
    {
        return $this->publisherId;
    }

    /**
     * @param int|null $publisherId
     */
    public function setPublisherId($publisherId)
    {
        $this->publisherId = $publisherId;
    }

    /**
     * @return int|null
     */
    public function getPartnerPublisherId()
    {
        return $this->partnerPublisherId;
    }

    /**
     * @param int|null $partnerPublisherId
     */
    public function setPartnerPublisherId($partnerPublisherId)
    {
        $this->partnerPublisherId = $partnerPublisherId;
    }

    /**
     * @return int|null
     */
    public function getCampaignId()
    {
        return $this->campaignId;
    }

    /**
     * @param int|null $campaignId
     */
    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;
    }

    /**
     * @return int|null
     */
    public function getPartnerCampaignId()
    {
        return $this->partnerCampaignId;
    }

    /**
     * @param int|null $partnerCampaignId
     */
    public function setPartnerCampaignId($partnerCampaignId)
    {
        $this->partnerCampaignId = $partnerCampaignId;
    }

    /**
     * @return int|null
     */
    public function getPricingModelId()
    {
        return $this->pricingModelId;
    }

    /**
     * @param int|null $pricingModelId
     */
    public function setPricingModelId($pricingModelId)
    {
        $this->pricingModelId = $pricingModelId;
    }

    /**
     * @return float|null
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * @param float|null $commission
     */
    public function setCommission($commission)
    {
        $this->commission = $commission;
    }

    /**
     * @return int|null
     */
    public function getCliId()
    {
        return $this->cliId;
    }

    /**
     * @param int|null $cliId
     */
    public function setCliId($cliId)
    {
        $this->cliId = $cliId;
    }

    /**
     * @return int|null
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param int|null $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @return null|string
     */
    public function getRecordingId()
    {
        return $this->recordingId;
    }

    /**
     * @param null|string $recordingId
     */
    public function setRecordingId($recordingId)
    {
        $this->recordingId = $recordingId;
    }
}
