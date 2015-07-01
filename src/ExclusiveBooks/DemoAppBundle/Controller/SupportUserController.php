<?php

namespace ExclusiveBooks\DemoAppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ExclusiveBooks\DemoAppBundle\Entity\SupportUser;
use ExclusiveBooks\DemoAppBundle\Form\SupportUserType;

/**
 * SupportUser controller.
 *
 */
class SupportUserController extends Controller
{

    /**
     * Lists all SupportUser entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ExclusiveBooksDemoAppBundle:SupportUser')->findAll();

        return $this->render('ExclusiveBooksDemoAppBundle:SupportUser:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SupportUser entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SupportUser();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
	    $this->addFlash('notice','The user was sucessfully created!');	
            return $this->redirect($this->generateUrl('admin_supportuser'));
        }

        return $this->render('ExclusiveBooksDemoAppBundle:SupportUser:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a SupportUser entity.
     *
     * @param SupportUser $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SupportUser $entity)
    {
        $form = $this->createForm(new SupportUserType(), $entity, array(
            'action' => $this->generateUrl('admin_supportuser_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SupportUser entity.
     *
     */
    public function newAction()
    {
        $entity = new SupportUser();
        $form   = $this->createCreateForm($entity);

        return $this->render('ExclusiveBooksDemoAppBundle:SupportUser:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SupportUser entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExclusiveBooksDemoAppBundle:SupportUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SupportUser entity.');
        }

	
        return $this->render('ExclusiveBooksDemoAppBundle:SupportUser:show.html.twig', array(
            'entity'      => $entity,
        ));
    }

    /**
     * Displays a form to edit an existing SupportUser entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExclusiveBooksDemoAppBundle:SupportUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SupportUser entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('ExclusiveBooksDemoAppBundle:SupportUser:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SupportUser entity.
    *
    * @param SupportUser $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SupportUser $entity)
    {
        $form = $this->createForm(new SupportUserType(), $entity, array(
            'action' => $this->generateUrl('admin_supportuser_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SupportUser entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExclusiveBooksDemoAppBundle:SupportUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SupportUser entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
	    	    $this->addFlash('notice','The user was sucessfully updated!');
            return $this->redirect($this->generateUrl('admin_supportuser'));
        }

        return $this->render('ExclusiveBooksDemoAppBundle:SupportUser:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }
   
}
