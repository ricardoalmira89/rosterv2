<?php

namespace Alm\RosterBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Alm\RosterBundle\Entity\Schedule;
use Alm\RosterBundle\Form\ScheduleType;

/**
 * Schedule controller.
 *
 * @Route("/schedule")
 */
class ScheduleController extends Controller
{

    /**
     * Lists all Schedule entities.
     *
     * @Route("/", name="schedule")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RosterBundle:Schedule')->findAll();

        return array(
            'pagination' => $this->get('knp_paginator')->paginate($entities, $this->get('request')->query->get('page', 1), 15),
        );
    }
    /**
     * Creates a new Schedule entity.
     *
     * @Route("/", name="schedule_create")
     * @Method("POST")
     * @Template("RosterBundle:Schedule:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Schedule();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('schedule_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Schedule entity.
     *
     * @param Schedule $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Schedule $entity)
    {
        $form = $this->createForm(new ScheduleType(), $entity, array(
            'action' => $this->generateUrl('schedule_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Schedule entity.
     *
     * @Route("/new", name="schedule_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Schedule();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Schedule entity.
     *
     * @Route("/{id}", name="schedule_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RosterBundle:Schedule')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Schedule entity.');
        }


        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Schedule entity.
     *
     * @Route("/{id}/edit", name="schedule_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RosterBundle:Schedule')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Schedule entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Schedule entity.
    *
    * @param Schedule $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Schedule $entity)
    {
        $form = $this->createForm(new ScheduleType(), $entity, array(
            'action' => $this->generateUrl('schedule_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Schedule entity.
     *
     * @Route("/{id}", name="schedule_update")
     * @Method("PUT")
     * @Template("RosterBundle:Schedule:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RosterBundle:Schedule')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Schedule entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('schedule_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Schedule entity.
     *
     * @Route("/delete/{id}", name="schedule_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('RosterBundle:Schedule')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Schedule entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('schedule'));
    }
}
