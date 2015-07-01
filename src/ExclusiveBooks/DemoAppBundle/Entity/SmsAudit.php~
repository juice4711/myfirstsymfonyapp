<?php

namespace ExclusiveBooks\DemoAppBundle\Entity;
use ExclusiveBooks\DemoAppBundle\Entity\SmsNotification;
use Doctrine\ORM\Mapping as ORM;

/**
 * SmsAudit
 */
class SmsAudit
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $recipientNumber;

    /**
     * @var string
     */
    private $smsText;

    /**
     * @var string
     */
    private $sendStatus;

    /**
     * @var string
     */
    private $sendResult;

    /**
     * @var \DateTime
     */
    private $sendDate;

    /**
     * @var string
     */
    private $sendUser;


     public function __construct($user, SmsNotification $smsdata)
    {
        $this->queueUser = $user;
        $this->recipientNumber = $smsdata->getRecipientNo();
	$this->sendStatus = $smsdata->getMesgStatus();
        $this->smsText = $smsdata->getSmsText();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set recipientNumber
     *
     * @param string $recipientNumber
     * @return SmsAudit
     */
    public function setRecipientNumber($recipientNumber)
    {
        $this->recipientNumber = $recipientNumber;

        return $this;
    }

    /**
     * Get recipientNumber
     *
     * @return string 
     */
    public function getRecipientNumber()
    {
        return $this->recipientNumber;
    }

    /**
     * Set smsText
     *
     * @param string $smsText
     * @return SmsAudit
     */
    public function setSmsText($smsText)
    {
        $this->smsText = $smsText;

        return $this;
    }

    /**
     * Get smsText
     *
     * @return string 
     */
    public function getSmsText()
    {
        return $this->smsText;
    }

    /**
     * Set sendStatus
     *
     * @param string $sendStatus
     * @return SmsAudit
     */
    public function setSendStatus($sendStatus)
    {
        $this->sendStatus = $sendStatus;

        return $this;
    }

    /**
     * Get sendStatus
     *
     * @return string 
     */
    public function getSendStatus()
    {
        return $this->sendStatus;
    }

    /**
     * Set sendResult
     *
     * @param string $sendResult
     * @return SmsAudit
     */
    public function setSendResult($sendResult)
    {
        $this->sendResult = $sendResult;

        return $this;
    }

    /**
     * Get sendResult
     *
     * @return string 
     */
    public function getSendResult()
    {
        return $this->sendResult;
    }

    /**
     * Set sendDate
     *
     * @param \DateTime $sendDate
     * @return SmsAudit
     */
    public function setSendDate($sendDate)
    {
        $this->sendDate = $sendDate;

        return $this;
    }

     /**
     * Get sendDate
     *
     * @return \DateTime 
     */
    public function getSendDate()
    {
        return $this->sendDate;
    }

    /**
     * Set sendUser
     *
     * @param string $sendUser
     * @return SmsAudit
     */
    public function setSendUser($sendUser)
    {
        $this->sendUser = $sendUser;

        return $this;
    }

    /**
     * Get sendUser
     *
     * @return string 
     */
    public function getSendUser()
    {
        return $this->sendUser;
    }
    /**
     * @var \DateTime
     */
    private $queueDate;


    /**
     * Set queueDate
     *
     * @param \DateTime $queueDate
     * @return SmsAudit
     */
    public function setQueueDate($queueDate)
    {
        $this->queueDate = $queueDate;

        return $this;
    }

    /**
     * Get queueDate
     *
     * @return \DateTime 
     */
    public function getQueueDate()
    {
        return $this->queueDate;
    }
    /**
     * @var string
     */
    private $queueUser;


    /**
     * Set queueUser
     *
     * @param string $queueUser
     * @return SmsAudit
     */
    public function setQueueUser($queueUser)
    {
        $this->queueUser = $queueUser;

        return $this;
    }

    /**
     * Get queueUser
     *
     * @return string 
     */
    public function getQueueUser()
    {
        return $this->queueUser;
    }


 	public function setSentAtValue()
    {
        
	    $this->sendDate = new \DateTime();

    }

     public function setQueuedAtValue()
	{
	    
	    $this->queueDate = new \DateTime();
	}
}
