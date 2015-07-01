<?php
namespace ExclusiveBooks\DemoAppBundle\Security\User;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class WebserviceUserProvider implements UserProviderInterface
{
    public function loadUserByUsername($username)
    {
       
       $salt = "";
       $roles[]="ROLE_ADMIN";
       $ldapconn = ldap_connect("10.12.0.22");
       $bind_rdn   = 'uid='.$username.',ou=people,dc=drp,dc=exclusives,dc=co,dc=za';
       $bind_rdn ='cn=directory manager';
       $ldappassword ='admin010';
       $bind = ldap_bind($ldapconn,$bind_rdn,$ldappassword);

	$dn = "ou=people,dc=drp,dc=exclusives,dc=co,dc=za";
	$filter="(|(uid=$username))";
	$sr=ldap_search($ldapconn, $dn, $filter);

	$info = ldap_get_entries($ldapconn, $sr);
	
       if ($info["count"] >0) {
  	       	$password =$info[0]["userpassword"][0];
        	$username =$info[0]["uid"][0];
            	return new WebserviceUser($username, $password, $salt, $roles);
	}

        throw new UsernameNotFoundException(
            sprintf('Username "%s" does not exist.', $username)
        );

    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof WebserviceUser) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === 'ExclusiveBooks\DemoAppBundle\Security\User\WebserviceUser';
    }
}
