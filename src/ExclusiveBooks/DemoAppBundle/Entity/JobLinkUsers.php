<?php

namespace ExclusiveBooks\DemoAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JobLinkUsers
 */
class JobLinkUsers
{
    /**
     * @var integer
     */
    private $JobId;

    /**
     * @var integer
     */
    private $UserId;


    /**
     * Set JobId
     *
     * @param integer $jobId
     * @return JobLinkUsers
     */
    public function setJobId($jobId)
    {
        $this->JobId = $jobId;

        return $this;
    }

    /**
     * Get JobId
     *
     * @return integer 
     */
    public function getJobId()
    {
        return $this->JobId;
    }

    /**
     * Set UserId
     *
     * @param integer $userId
     * @return JobLinkUsers
     */
    public function setUserId($userId)
    {
        $this->UserId = $userId;

        return $this;
    }

    /**
     * Get UserId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->UserId;
    }
    /**
     * @var integer
     */
    private $id;


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
     * @var \ExclusiveBooks\DemoAppBundle\Entity\JobDescription
     */
    private $linkjob;


    /**
     * Set linkjob
     *
     * @param \ExclusiveBooks\DemoAppBundle\Entity\JobDescription $linkjob
     * @return JobLinkUsers
     */
    public function setLinkjob(\ExclusiveBooks\DemoAppBundle\Entity\JobDescription $linkjob = null)
    {
        $this->linkjob = $linkjob;

        return $this;
    }

    /**
     * Get linkjob
     *
     * @return \ExclusiveBooks\DemoAppBundle\Entity\JobDescription 
     */
    public function getLinkjob()
    {
        return $this->linkjob;
    }
    /**
     * @var \ExclusiveBooks\DemoAppBundle\Entity\SupportUser
     */
    private $linkuser;


    /**
     * Set linkuser
     *
     * @param \ExclusiveBooks\DemoAppBundle\Entity\SupportUser $linkuser
     * @return JobLinkUsers
     */
    public function setLinkuser(\ExclusiveBooks\DemoAppBundle\Entity\SupportUser $linkuser = null)
    {
        $this->linkuser = $linkuser;

        return $this;
    }

    /**
     * Get linkuser
     *
     * @return \ExclusiveBooks\DemoAppBundle\Entity\SupportUser 
     */
    public function getLinkuser()
    {
        return $this->linkuser;
    }
}
