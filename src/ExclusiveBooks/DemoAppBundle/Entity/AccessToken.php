<?php
// src/ExclusiveBooks/DemoAppBundle/Entity/AccessToken.php

namespace ExclusiveBooks\DemoAppBundle\Entity;

use FOS\OAuthServerBundle\Entity\AccessToken as BaseAccessToken;
use Doctrine\ORM\Mapping as ORM;


class AccessToken extends BaseAccessToken
{
    protected $id;

    protected $client;

    protected $user;
    /**
     * @var \ExclusiveBooks\DemoAppBundle\Entity\Client
     */
    private $server;


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
     * Set server
     *
     * @param \ExclusiveBooks\DemoAppBundle\Entity\Client $server
     * @return AccessToken
     */
    public function setServer(\ExclusiveBooks\DemoAppBundle\Entity\Client $server = null)
    {
        $this->server = $server;

        return $this;
    }

    /**
     * Get server
     *
     * @return \ExclusiveBooks\DemoAppBundle\Entity\Client 
     */
    public function getServer()
    {
        return $this->server;
    }
}
