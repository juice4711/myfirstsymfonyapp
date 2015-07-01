<?php

namespace ExclusiveBooks\DemoAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JobConfigData
 */
class JobConfigData
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $configName;

    /**
     * @var string
     */
    private $configValue;


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
     * Set configName
     *
     * @param string $configName
     * @return JobConfigData
     */
    public function setConfigName($configName)
    {
        $this->configName = $configName;

        return $this;
    }

    /**
     * Get configName
     *
     * @return string 
     */
    public function getConfigName()
    {
        return $this->configName;
    }

    /**
     * Set configValue
     *
     * @param string $configValue
     * @return JobConfigData
     */
    public function setConfigValue($configValue)
    {
        $this->configValue = $configValue;

        return $this;
    }

    /**
     * Get configValue
     *
     * @return string 
     */
    public function getConfigValue()
    {
        return $this->configValue;
    }

    /**
     * initialise class with values
     *
     * @param \ExclusiveBooks\DemoAppBundle\Entity\JobDescription $jobIdentifier, string $configType, string $configValue
     * @return JobConfigData
     */
   public function initialiseNewJob(\ExclusiveBooks\DemoAppBundle\Entity\JobDescription $jobIdentifier, $configtype,$configvalue)
	{
		$this->SetJob($jobIdentifier);
		$this->SetconfigName($configtype);
		$this->SetconfigValue($configvalue);
		return $this;
	}

   private $jobs;
  
    /**
     * @var \ExclusiveBooks\DemoAppBundle\Entity\JobDescription
     */
    private $job;


    /**
     * Set job
     *
     * @param \ExclusiveBooks\DemoAppBundle\Entity\JobDescription $job
     * @return JobConfigData
     */
    public function setJob(\ExclusiveBooks\DemoAppBundle\Entity\JobDescription $job = null)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return \ExclusiveBooks\DemoAppBundle\Entity\JobDescription 
     */
    public function getJob()
    {
        return $this->job;
    }
}
