<?php

namespace ExclusiveBooks\DemoAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * JobDescription
 */
class JobDescription
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $jobIdentifier;

    /**
     * @var string
     */
    private $jobName;

    /**
     * @var string
     */
    private $jobComment;

    /**
     * @var string
     */
    private $cronSchedule;

    /**
     * @var string
     */
    private $scriptLocation;

    /**
     * @var string
     */
    private $scriptIdentifier;

    /**
     * @var string
     */
    private $jobStatus;

    /**
     * @var string
     */
    private $controlTable;

    /**
     * @var string
     */
    private $jobArguments;


    public function __toString()
    {
        return strval($this->id);
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
     * Set jobIdentifier
     *
     * @param string $jobIdentifier
     * @return JobDescription
     */
    public function setJobIdentifier($jobIdentifier)
    {
        $this->jobIdentifier = $jobIdentifier;

        return $this;
    }

    /**
     * Get jobIdentifier
     *
     * @return string 
     */
    public function getJobIdentifier()
    {
        return $this->jobIdentifier;
    }

    /**
     * Set jobName
     *
     * @param string $jobName
     * @return JobDescription
     */
    public function setJobName($jobName)
    {
        $this->jobName = $jobName;

        return $this;
    }

    /**
     * Get jobName
     *
     * @return string 
     */
    public function getJobName()
    {
        return $this->jobName;
    }

    /**
     * Set jobComment
     *
     * @param string $jobComment
     * @return JobDescription
     */
    public function setJobComment($jobComment)
    {
        $this->jobComment = $jobComment;

        return $this;
    }

    /**
     * Get jobComment
     *
     * @return string 
     */
    public function getJobComment()
    {
        return $this->jobComment;
    }

    /**
     * Set cronSchedule
     *
     * @param string $cronSchedule
     * @return JobDescription
     */
    public function setCronSchedule($cronSchedule)
    {
        $this->cronSchedule = $cronSchedule;

        return $this;
    }

    /**
     * Get cronSchedule
     *
     * @return string 
     */
    public function getCronSchedule()
    {
        return $this->cronSchedule;
    }

    /**
     * Set scriptLocation
     *
     * @param string $scriptLocation
     * @return JobDescription
     */
    public function setScriptLocation($scriptLocation)
    {
        $this->scriptLocation = $scriptLocation;

        return $this;
    }

    /**
     * Get scriptLocation
     *
     * @return string 
     */
    public function getScriptLocation()
    {
        return $this->scriptLocation;
    }

    /**
     * Set scriptIdentifier
     *
     * @param string $scriptIdentifier
     * @return JobDescription
     */
    public function setScriptIdentifier($scriptIdentifier)
    {
        $this->scriptIdentifier = $scriptIdentifier;

        return $this;
    }

    /**
     * Get scriptIdentifier
     *
     * @return string 
     */
    public function getScriptIdentifier()
    {
        return $this->scriptIdentifier;
    }

    /**
     * Set jobStatus
     *
     * @param string $jobStatus
     * @return JobDescription
     */
    public function setJobStatus($jobStatus)
    {
        $this->jobStatus = $jobStatus;

        return $this;
    }

    /**
     * Get jobStatus
     *
     * @return string 
     */
    public function getJobStatus()
    {
        return $this->jobStatus;
    }

    /**
     * Set controlTable
     *
     * @param string $controlTable
     * @return JobDescription
     */
    public function setControlTable($controlTable)
    {
        $this->controlTable = $controlTable;

        return $this;
    }

    /**
     * Get controlTable
     *
     * @return string 
     */
    public function getControlTable()
    {
        return $this->controlTable;
    }

    /**
     * Set jobArguments
     *
     * @param string $jobArguments
     * @return JobDescription
     */
    public function setJobArguments($jobArguments)
    {
        $this->jobArguments = $jobArguments;

        return $this;
    }

    /**
     * Get jobArguments
     *
     * @return string 
     */
    public function getJobArguments()
    {
        return $this->jobArguments;
    }
    /**
     * @var string
     */
    private $escalationChain;


    /**
     * Set escalationChain
     *
     * @param string $escalationChain
     * @return JobDescription
     */
    public function setEscalationChain($escalationChain)
    {
        $this->escalationChain = $escalationChain;

        return $this;
    }

    /**
     * Get escalationChain
     *
     * @return string 
     */
    public function getEscalationChain()
    {
        return $this->escalationChain;
    }

    private $server;

    /**
     * Set server
     *
     * @param \ExclusiveBooks\DemoAppBundle\Entity\Server $server
     * @return JobDescription
     */
    public function setServer(\ExclusiveBooks\DemoAppBundle\Entity\Server $server = null)
    {
        $this->server = $server;

        return $this;
    }

   
    /**
     * Get server
     *
     * @return \ExclusiveBooks\DemoAppBundle\Entity\Server 
     */
    public function getServer()
    {
        return $this->server;
    }
    

    public function setDefaultsOnCreate()
	{
	$this->setJobStatus('A');
	}

	/** 
	 * Clone jobDescription
	 * Clones a JobDescription line 
	 * @param \ExclusiveBooks\DemoAppBundle\Entity\JobDescription $entity2
	 * @return JobDescription
	 */

    public function clonefromJob(\ExclusiveBooks\DemoAppBundle\Entity\JobDescription $entity2)
	{
        $this->setjobIdentifier($entity2->getjobIdentifier()."a");
	$this->setjobName($entity2->getjobName()." (cloned)");
	$this->setjobComment($entity2->getjobComment());
	$this->setscriptLocation($entity2->getscriptLocation());
	$this->setscriptIdentifier($entity2->getscriptIdentifier());
	$this->setcontrolTable($entity2->getcontrolTable());
	$this->setJobArguments($entity2->getJobArguments());
	$this->setescalationChain($entity2->getescalationChain());
	$this->setcronSchedule($entity2->getcronSchedule());
	$this->setServer($entity2->getServer());
	$this->setrunType($entity2->getrunType());
	return $this;
	}

    /**
     * @var string
     */
    private $runType;


    /**
     * Set runType
     *
     * @param string $runType
     * @return JobDescription
     */
    public function setRunType($runType)
    {
        $this->runType = $runType;

        return $this;
    }

    /**
     * Get runType
     *
     * @return string 
     */
    public function getRunType()
    {
        return $this->runType;
    }

     

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $joblink;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->joblink = new \Doctrine\Common\Collections\ArrayCollection();
	$this->jobconfig = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add joblink
     *
     * @param \ExclusiveBooks\DemoAppBundle\Entity\JobLinkUsers $joblink
     * @return JobDescription
     */
    public function addJoblink(\ExclusiveBooks\DemoAppBundle\Entity\JobLinkUsers $joblink)
    {
        $this->joblink[] = $joblink;

        return $this;
    }

    /**
     * Remove joblink
     *
     * @param \ExclusiveBooks\DemoAppBundle\Entity\JobLinkUsers $joblink
     */
    public function removeJoblink(\ExclusiveBooks\DemoAppBundle\Entity\JobLinkUsers $joblink)
    {
        $this->joblink->removeElement($joblink);
    }

    /**
     * Get joblink
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJoblink()
    {
        return $this->joblink;
    }

  /**
     * Add jobconfig
     *
     * @param \ExclusiveBooks\DemoAppBundle\Entity\JobConfigData $jobconfig
     * @return JobDescription
     */
    public function addJobconfig(\ExclusiveBooks\DemoAppBundle\Entity\JobConfigData $jobconfig)
    {
        $this->jobconfig[] = $jobconfig;

        return $this;
    }

    /**
     * Remove jobconfig
     *
     * @param \ExclusiveBooks\DemoAppBundle\Entity\JobConfigData $jobconfig
     */
    public function removeJobconfig(\ExclusiveBooks\DemoAppBundle\Entity\JobConfigData $jobconfig)
    {
        $this->jobconfig->removeElement($jobconfig);
    }

    /**
     * Get jobconfig
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJobconfig()
    {
        return $this->jobconfig;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $jobconfig;


}
