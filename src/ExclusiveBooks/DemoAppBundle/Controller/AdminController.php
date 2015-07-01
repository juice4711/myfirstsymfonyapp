<?php
namespace ExclusiveBooks\DemoAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Length;
use ExclusiveBooks\DemoAppBundle\Validator\Constraints\IsSecurePassword;
/**
* Admin Login SCreen
*
* display default login screen
* authenticate user 
* redirect to menu builder if login suceeds or login page if failes
*
* @author Supreme Ruler Of Universe 
*/

class AdminController extends Controller
{
    public function indexAction(Request $request)
    {

        $defaults = array(
	'username' => 'auser',
        'password' => '',
        );

	$form = $this->createFormBuilder($defaults)
            ->add('username', 'text', array(
        'constraints' => array(
            new NotBlank(),
	    new Length(array('min' => 3,'max' => 20)),
        ),
   ))
	->add('password', 'password', array(
       'constraints' => array(
           new IsSecurePassword(),
           new Length(array('min' => 3,'max' => 20)),
       ),
   ))
	->add('login', 'submit')
            ->getForm();

	$form->handleRequest($request);

    if ($form->isValid()) {
        $data = $form->getData();

        // ... perform some action, such as saving the data to the database

        return $this->redirectToRoute('random',array('limit' => '10000'));
    }

	return $this->render('ExclusiveBooksDemoAppBundle:Admin:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

 public function mainmenuAction()
    {

       
	return $this->render('ExclusiveBooksDemoAppBundle:Admin:menu.html.twig');
    }
}
