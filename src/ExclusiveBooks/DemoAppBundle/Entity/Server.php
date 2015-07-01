<?php

namespace ExclusiveBooks\DemoAppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Server
 */
class Server
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $serverName;

    /**
     * @var string
     */
    private $serverLocation;

    /**
     * @var string
     */
    private $serverIP;

    /**
     * @var string
     */
    private $serverStatus;

    /**
     * @var string
     */
    private $serverProcesses;


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
     * Set serverName
     *
     * @param string $serverName
     * @return Server
     */
    public function setServerName($serverName)
    {
        $this->serverName = $serverName;

        return $this;
    }

    /**
     * Get serverName
     *
     * @return string 
     */
    public function getServerName()
    {
        return $this->serverName;
    }

    /**
     * Set serverLocation
     *
     * @param string $serverLocation
     * @return Server
     */
    public function setServerLocation($serverLocation)
    {
        $this->serverLocation = $serverLocation;

        return $this;
    }

    /**
     * Get serverLocation
     *
     * @return string 
     */
    public function getServerLocation()
    {
        return $this->serverLocation;
    }

    /**
     * Set serverIP
     *
     * @param string $serverIP
     * @return Server
     */
    public function setServerIP($serverIP)
    {
        $this->serverIP = $serverIP;

        return $this;
    }

    /**
     * Get serverIP
     *
     * @return string 
     */
    public function getServerIP()
    {
        return $this->serverIP;
    }

    /**
     * Set serverStatus
     *
     * @param string $serverStatus
     * @return Server
     */
    public function setServerStatus($serverStatus)
    {
        $this->serverStatus = $serverStatus;

        return $this;
    }

    /**
     * Get serverStatus
     *
     * @return string 
     */
    public function getServerStatus()
    {
        return $this->serverStatus;
    }

    /**
     * Set serverProcesses
     *
     * @param string $serverProcesses
     * @return Server
     */
    public function setServerProcesses($serverProcesses)
    {
        $this->serverProcesses = $serverProcesses;

        return $this;
    }

    /**
     * Get serverProcesses
     *
     * @return string 
     */
    public function getServerProcesses()
    {
        return $this->serverProcesses;
    }

	public function setDefaultsOnCreate()
	{
	$this->setserverStatus('N');
        $this->setServerProcesses('');
	}
    protected $jobs;

    public function __construct()
    {
        $this->jobs = new ArrayCollection();
    }

    /**
     * Add jobs
     *
     * @param \ExclusiveBooks\DemoAppBundle\Entity\JobDescription $jobs
     * @return Server
     */
    public function addJob(\ExclusiveBooks\DemoAppBundle\Entity\JobDescription $jobs)
    {
        $this->jobs[] = $jobs;

        return $this;
    }

    /**
     * Remove jobs
     *
     * @param \ExclusiveBooks\DemoAppBundle\Entity\JobDescription $jobs
     */
    public function removeJob(\ExclusiveBooks\DemoAppBundle\Entity\JobDescription $jobs)
    {
        $this->jobs->removeElement($jobs);
    }

    /**
     * Get jobs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJobs()
    {
        return $this->jobs;
    }
}
