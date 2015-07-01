<?php

namespace ExclusiveBooks\DemoAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;

use ExclusiveBooks\DemoAppBundle\Entity\SmsAudit;

/**
 * Server controller.
 *
 */
class RestController extends FOSRestController
{

   
    /**
     * Finds and displays a Server entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExclusiveBooksDemoAppBundle:SmsAudit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find smsAudit entity.');
        }

	$view = $this->view($entity, 200)
            ->setTemplate("MyBundle:Users:getServer.html.twig")
            ->setTemplateVar('smsAudit')
        ;

        return $this->handleView($view);
    }
 
   public function showAllAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExclusiveBooksDemoAppBundle:SmsAudit')->findAllMesg();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Server entity.');
        }

	$view = $this->view($entity, 200)
            ->setTemplate("MyBundle:Users:getServer.html.twig")
            ->setTemplateVar('smsAudit')
        ;

        return $this->handleView($view);
    }
 

}
