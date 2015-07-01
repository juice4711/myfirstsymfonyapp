<?php

namespace ExclusiveBooks\DemoAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ExclusiveBooksDemoAppBundle:Default:index.html.twig', array('name' => $name));
    }
}
