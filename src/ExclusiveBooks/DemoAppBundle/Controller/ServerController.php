<?php

namespace ExclusiveBooks\DemoAppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ExclusiveBooks\DemoAppBundle\Entity\Server;
use ExclusiveBooks\DemoAppBundle\Form\ServerType;

/**
 * Server controller.
 *
 */
class ServerController extends Controller
{

    /**
     * Lists all Server entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ExclusiveBooksDemoAppBundle:Server')->findAllActive();

        return $this->render('ExclusiveBooksDemoAppBundle:Server:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Server entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Server();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
	
	    $this->addFlash('notice','The server was sucessfully created!');	
            return $this->redirect($this->generateUrl('admin_server'));
        }

        return $this->render('ExclusiveBooksDemoAppBundle:Server:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Server entity.
     *
     * @param Server $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Server $entity)
    {
        $form = $this->createForm(new ServerType(), $entity, array(
            'action' => $this->generateUrl('admin_server_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Server entity.
     *
     */
    public function newAction()
    {
        $entity = new Server();
        $form   = $this->createCreateForm($entity);

        return $this->render('ExclusiveBooksDemoAppBundle:Server:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Server entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExclusiveBooksDemoAppBundle:Server')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Server entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ExclusiveBooksDemoAppBundle:Server:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Server entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExclusiveBooksDemoAppBundle:Server')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Server entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ExclusiveBooksDemoAppBundle:Server:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Server entity.
    *
    * @param Server $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Server $entity)
    {
        $form = $this->createForm(new ServerType(), $entity, array(
            'action' => $this->generateUrl('admin_server_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Server entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExclusiveBooksDemoAppBundle:Server')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Server entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->addFlash('notice','The server was sucessfully updated!');	
            return $this->redirect($this->generateUrl('admin_server'));
        }

        return $this->render('ExclusiveBooksDemoAppBundle:Server:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Server entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ExclusiveBooksDemoAppBundle:Server')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Server entity.');
            }
		$entity->setserverStatus('D');
               $em->flush();
        }
            $this->addFlash('notice','The server was sucessfully deactivated!');
        return $this->redirect($this->generateUrl('admin_server'));
    }

    /**
     * Creates a form to delete a Server entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_server_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Deactivate'))
            ->getForm()
        ;
    }
}
