<?php
namespace ExclusiveBooks\DemoAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ExclusiveBooks\DemoAppBundle\Entity\Server;
use ExclusiveBooks\DemoAppBundle\Entity\JobDescription;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\HttpFoundation\Session\Session;

class DashboardAdminController extends Controller
{
    public function indexAction(Request $request)
    {
      $session = $request->getSession();
      return $this->render('ExclusiveBooksDemoAppBundle:DashboardAdmin:index.html.twig');
    }


 
}
