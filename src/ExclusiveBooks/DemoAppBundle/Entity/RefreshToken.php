<?php
// src/ExclusiveBooks/DemoAppBundle/Entity/RefreshToken.php

namespace ExclusiveBooks\DemoAppBundle\Entity;

use FOS\OAuthServerBundle\Entity\RefreshToken as BaseRefreshToken;
use Doctrine\ORM\Mapping as ORM;

class RefreshToken extends BaseRefreshToken
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
     * @return RefreshToken
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
