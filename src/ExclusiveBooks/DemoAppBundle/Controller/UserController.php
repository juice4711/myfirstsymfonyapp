<?php

namespace ExclusiveBooks\DemoAppBundle\Controller;

use ExclusiveBooks\DemoAppBundle\Model\User;
use ExclusiveBooks\DemoAppBundle\Model\UserQuery;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController
{
    /**
     * @Rest\View
     */
    public function allAction()
    {
        //$users = UserQuery::create()->find();
	
        return array('users' => $users);
    }

    /**
     * @Rest\View
     */
    public function getAction($id)
    {
        
        return array('user' => $user);
    }
}
