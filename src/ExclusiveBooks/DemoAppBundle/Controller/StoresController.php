<?php

namespace ExclusiveBooks\DemoAppBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ExclusiveBooks\DemoAppBundle\Entity\SmsNotification;
use ExclusiveBooks\DemoAppBundle\Entity\SmsAudit;
use ExclusiveBooks\DemoAppBundle\Form\NotificationType;

/**
 * Stores controller.
 *
 */
class StoresController extends Controller
{

    /**
     * Lists all Store entities.
     *
     */
    public function welcomeAction(Request $request)
    {
	$smsarray = array('Username'=>$this->container->getParameter('smsnotification.username'),
		'Password'=> $this->container->getParameter('smsnotification.passphrase'),
		'numto'=>$this->container->getParameter('smsnotification.recipientno'),
		'env' =>$this->container->get( 'kernel' )->getEnvironment(),);
	$entity = new SmsNotification($smsarray);
        $form   = $this->createCreateForm($entity);
       return $this->render('ExclusiveBooksDemoAppBundle:Stores:index.html.twig',array(
            'form' => $form->createView(),
        ));
    }

    public function sendsmsAction(Request $request)
    {
	$smsarray = array('Username'=>$this->container->getParameter('smsnotification.username'),
		'Password'=> $this->container->getParameter('smsnotification.passphrase'),
		'numto'=>$this->container->getParameter('smsnotification.recipientno'),
		'env' =>$this->container->get( 'kernel' )->getEnvironment(),);

        $entity = new SmsNotification($smsarray);
        $form   = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
		//send actual sms

	    if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')){$user=$this->getUser()->getUsername();} else {$user="anon";}
            $em = $this->getDoctrine()->getManager();
	    $entity2=new SmsAudit($user,$entity);
	    $em->persist($entity2);
	    $em->flush();

	    $this->get('old_sound_rabbit_mq.sms_notification_producer')->publish($entity->getQueueMsg($entity2->getId()));
	    $this->addFlash('notice','Sms Notification Queued');	
            $em = $this->getDoctrine()->getManager();
	    
	    
            return $this->redirect($this->generateUrl('store_welcome'));
        }
       return $this->render('ExclusiveBooksDemoAppBundle:Stores:index.html.twig',array(
            'form' => $form->createView(),
        ));
    }
    /**
     * Creates a form to create a Server entity.
     *
     * @param Server $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SmsNotification $entity)
    {
        $form = $this->createForm(new NotificationType(), $entity, array(
            'action' => $this->generateUrl('store_send_sms'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Send SMS'));

        return $form;
    }

}
