<?php
namespace ExclusiveBooks\DemoAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RandomController extends Controller
{
    public function indexAction($limit)
    {
	$number = rand(1, $limit);

        return $this->render(
            'ExclusiveBooksDemoAppBundle:Random:index.html.twig',
            array('number' => $number)
        );
    }
}
