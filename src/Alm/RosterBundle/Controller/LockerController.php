<?php

namespace Alm\RosterBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Alm\RosterBundle\Entity\Locker;
use Alm\RosterBundle\Form\LockerType;

/**
 * Locker controller.
 *
 * @Route("/locker")
 */
class LockerController extends Controller
{

    /**
     * Lists all Locker entities.
     *
     * @Route("/", name="locker")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RosterBundle:Locker')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Locker entity.
     *
     * @Route("/", name="locker_create")
     * @Method("POST")
     * @Template("RosterBundle:Locker:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Locker();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('locker_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Locker entity.
     *
     * @param Locker $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Locker $entity)
    {
        $form = $this->createForm(new LockerType(), $entity, array(
            'action' => $this->generateUrl('locker_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Locker entity.
     *
     * @Route("/new", name="locker_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Locker();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Locker entity.
     *
     * @Route("/{id}", name="locker_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RosterBundle:Locker')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Locker entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Locker entity.
     *
     * @Route("/{id}/edit", name="locker_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RosterBundle:Locker')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Locker entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Locker entity.
    *
    * @param Locker $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Locker $entity)
    {
        $form = $this->createForm(new LockerType(), $entity, array(
            'action' => $this->generateUrl('locker_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Locker entity.
     *
     * @Route("/{id}", name="locker_update")
     * @Method("PUT")
     * @Template("RosterBundle:Locker:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RosterBundle:Locker')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Locker entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('locker_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Locker entity.
     *
     * @Route("/{id}", name="locker_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RosterBundle:Locker')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Locker entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('locker'));
    }

    /**
     * Creates a form to delete a Locker entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('locker_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
