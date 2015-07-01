<?php

namespace ExclusiveBooks\DemoAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SupportUser
 */
class SupportUser
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $userName;

    /**
     * @var string
     */
    private $userEmail;

    /**
     * @var string
     */
    private $userEmailAlt;

    /**
     * @var string
     */
    private $userContact;

    /**
     * @var string
     */
    private $userContactAlt;

    /**
     * @var string
     */
    private $cerberusID;

    /**
     * @var string
     */
    private $givenName;

    /**
     * @var string
     */
    private $avatar;

    /**
     * @var string
     */
    private $userContactInternal;


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
     * Set userName
     *
     * @param string $userName
     * @return SupportUser
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string 
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set userEmail
     *
     * @param string $userEmail
     * @return SupportUser
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Get userEmail
     *
     * @return string 
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

   
    /**
     * Set userContact
     *
     * @param string $userContact
     * @return SupportUser
     */
    public function setUserContact($userContact)
    {
        $this->userContact = $userContact;

        return $this;
    }

    /**
     * Get userContact
     *
     * @return string 
     */
    public function getUserContact()
    {
        return $this->userContact;
    }

    /**
     * Set userContactAlt
     *
     * @param string $userContactAlt
     * @return SupportUser
     */
    public function setUserContactAlt($userContactAlt)
    {
        $this->userContactAlt = $userContactAlt;

        return $this;
    }

    /**
     * Get userContactAlt
     *
     * @return string 
     */
    public function getUserContactAlt()
    {
        return $this->userContactAlt;
    }

    /**
     * Set cerberusID
     *
     * @param string $cerberusID
     * @return SupportUser
     */
    public function setCerberusID($cerberusID)
    {
        $this->cerberusID = $cerberusID;

        return $this;
    }

    /**
     * Get cerberusID
     *
     * @return string 
     */
    public function getCerberusID()
    {
        return $this->cerberusID;
    }

    /**
     * Set givenName
     *
     * @param string $givenName
     * @return SupportUser
     */
    public function setGivenName($givenName)
    {
        $this->givenName = $givenName;

        return $this;
    }

    /**
     * Get givenName
     *
     * @return string 
     */
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     * @return SupportUser
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set userContactInternal
     *
     * @param string $userContactInternal
     * @return SupportUser
     */
    public function setUserContactInternal($userContactInternal)
    {
        $this->userContactInternal = $userContactInternal;

        return $this;
    }

    /**
     * Get userContactInternal
     *
     * @return string 
     */
    public function getUserContactInternal()
    {
        return $this->userContactInternal;
    }



    /**
     * Set userEmailAlt
     *
     * @param string $userEmailAlt
     * @return SupportUser
     */
    public function setUserEmailAlt($userEmailAlt)
    {
        $this->userEmailAlt = $userEmailAlt;

        return $this;
    }

    /**
     * Get userEmailAlt
     *
     * @return string 
     */
    public function getUserEmailAlt()
    {
        return $this->userEmailAlt;
    }
   
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $userlink;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userlink = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add userlink
     *
     * @param \ExclusiveBooks\DemoAppBundle\Entity\JobLinkUsers $userlink
     * @return SupportUser
     */
    public function addUserlink(\ExclusiveBooks\DemoAppBundle\Entity\JobLinkUsers $userlink)
    {
        $this->userlink[] = $userlink;

        return $this;
    }

    /**
     * Remove userlink
     *
     * @param \ExclusiveBooks\DemoAppBundle\Entity\JobLinkUsers $userlink
     */
    public function removeUserlink(\ExclusiveBooks\DemoAppBundle\Entity\JobLinkUsers $userlink)
    {
        $this->userlink->removeElement($userlink);
    }

    /**
     * Get userlink
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserlink()
    {
        return $this->userlink;
    }
}
