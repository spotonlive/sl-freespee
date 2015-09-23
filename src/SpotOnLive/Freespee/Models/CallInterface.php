<?php

namespace SpotOnLive\Freespee\Models;

interface CallInterface
{
    /**
     * @return int
     */
    public function getCdrId();

    /**
     * @param int $cdrId
     */
    public function setCdrId($cdrId);

    /**
     * @return \DateTime
     */
    public function getStart();

    /**
     * @param \DateTime $start
     */
    public function setStart($start);

    /**
     * @return int
     */
    public function getDuration();

    /**
     * @param int $duration
     */
    public function setDuration($duration);

    /**
     * @return int
     */
    public function getDurationAdjusted();

    /**
     * @param int $durationAdjusted
     */
    public function setDurationAdjusted($durationAdjusted);

    /**
     * @return string
     */
    public function getAnum();

    /**
     * @param string $anum
     */
    public function setAnum($anum);

    /**
     * @return string
     */
    public function getAnumMd5();

    /**
     * @param string $anumMd5
     */
    public function setAnumMd5($anumMd5);

    /**
     * @return string
     */
    public function getBnum();

    /**
     * @param string $bnum
     */
    public function setBnum($bnum);

    /**
     * @return string
     */
    public function getCnum();

    /**
     * @param string $cnum
     */
    public function setCnum($cnum);

    /**
     * @return int
     */
    public function getCustomerId();

    /**
     * @param int $customerId
     */
    public function setCustomerId($customerId);

    /**
     * @return int
     */
    public function getSourceId();

    /**
     * @param int $sourceId
     */
    public function setSourceId($sourceId);

    /**
     * @return int
     */
    public function getCustomerNumber();

    /**
     * @param int $customerNumber
     */
    public function setCustomerNumber($customerNumber);

    /**
     * @return int
     */
    public function getAnswered();

    /**
     * @param int $answered
     */
    public function setAnswered($answered);

    /**
     * @return int
     */
    public function getQuarantined();

    /**
     * @param int $quarantined
     */
    public function setQuarantined($quarantined);

    /**
     * @return string
     */
    public function getAnumNdcName();

    /**
     * @param string $anumNdcName
     */
    public function setAnumNdcName($anumNdcName);

    /**
     * @return \DateTime|null
     */
    public function getExpire();

    /**
     * @param \DateTime|null $expire
     */
    public function setExpire($expire);

    /**
     * @return \DateTime|null
     */
    public function getSourceTimestamp();

    /**
     * @param \DateTime|null $sourceTimestamp
     */
    public function setSourceTimestamp($sourceTimestamp);

    /**
     * @return null|string
     */
    public function getSourceName();

    /**
     * @param null|string $sourceName
     */
    public function setSourceName($sourceName);

    /**
     * @return null|string
     */
    public function getSourceMedia();

    /**
     * @param null|string $sourceMedia
     */
    public function setSourceMedia($sourceMedia);

    /**
     * @return int|null
     */
    public function getClass();

    /**
     * @param int|null $class
     */
    public function setClass($class);

    /**
     * @return int|null
     */
    public function getPublisherId();

    /**
     * @param int|null $publisherId
     */
    public function setPublisherId($publisherId);

    /**
     * @return int|null
     */
    public function getPartnerPublisherId();

    /**
     * @param int|null $partnerPublisherId
     */
    public function setPartnerPublisherId($partnerPublisherId);

    /**
     * @return int|null
     */
    public function getCampaignId();

    /**
     * @param int|null $campaignId
     */
    public function setCampaignId($campaignId);

    /**
     * @return int|null
     */
    public function getPartnerCampaignId();

    /**
     * @param int|null $partnerCampaignId
     */
    public function setPartnerCampaignId($partnerCampaignId);

    /**
     * @return int|null
     */
    public function getPricingModelId();

    /**
     * @param int|null $pricingModelId
     */
    public function setPricingModelId($pricingModelId);

    /**
     * @return float|null
     */
    public function getCommission();

    /**
     * @param float|null $commission
     */
    public function setCommission($commission);

    /**
     * @return int|null
     */
    public function getCliId();

    /**
     * @param int|null $cliId
     */
    public function setCliId($cliId);

    /**
     * @return int|null
     */
    public function getOrderId();

    /**
     * @param int|null $orderId
     */
    public function setOrderId($orderId);

    /**
     * @return null|string
     */
    public function getRecordingId();

    /**
     * @param null|string $recordingId
     */
    public function setRecordingId($recordingId);
}
