<?php

namespace Alm\RosterBundle\Controller;

use Alm\RosterBundle\Entity\DropInfo;
use Alm\RosterBundle\Entity\Graduated;
use Alm\RosterBundle\Form\DropInfoType;
use Alm\RosterBundle\Form\GraduatedType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Alm\RosterBundle\Entity\Student;
use Alm\RosterBundle\Form\StudentType;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Student controller.
 *
 * @Route("/student")
 */
class StudentController extends Controller
{

    /**
     * Lists all Student entities.
     *
     * @Route("/", name="student")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createFormBuilder()
            ->add('criteria', 'search', array(
                  'required' => false))
            ->add('fields', 'choice', array(
                'choices' => array(
                    'cv' => 'CV#',
                    'email' => 'Email',
                    'firstName' => 'First Name',
                    'lastName' => 'Last Name',
                ),
                'expanded' => false,
                'required' => false,
                'empty_value' => 'Select Field'
            ))
            ->getForm();

        $form->handleRequest($request);

        $entities = $em->getRepository('RosterBundle:Student')->findAll();
        if ($request->getMethod() == 'POST'){

            $field = $form->get('fields')->getData();
            if ($field){
                $entities = $em->getRepository('RosterBundle:Student')->findBy(array($field => $form->get('criteria')->getData()));
            } else
                $entities = $em->getRepository('RosterBundle:Student')->studentsSimpleSearch($form->get('criteria')->getData());

        }

        return array(
            'pagination' => $this->get('knp_paginator')->paginate($entities, $this->get('request')->query->get('page', 1), 15),
            'form' => $form->createView()
        );
    }
    /**
     * Creates a new Student entity.
     *
     * @Route("/create", name="student_create")
     * @Method("POST")
     * @Template("RosterBundle:Student:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Student();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setStatus(0); //Pre-Start por defecto
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice','Student created successfully!');

            return $this->redirect($this->generateUrl('student_show', array('id' => $entity->getId())));
        }

        $this->get('session')->getFlashBag()->add('error','Oops! An error has ocurred while trying to add a new student');

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Student entity.
     *
     * @param Student $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Student $entity)
    {
        $form = $this->createForm(new StudentType(), $entity, array(
            'action' => $this->generateUrl('student_create'),
            'method' => 'POST',
        ));

        $form->remove('dropInfo')
             ->remove('graduated');

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Student entity.
     *
     * @Route("/new", name="student_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Student();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Student entity.
     *
     * @Route("/{id}", name="student_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RosterBundle:Student')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Student entity.
     *
     * @Route("/{id}/edit", name="student_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RosterBundle:Student')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Student entity.
    *
    * @param Student $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Student $entity)
    {
        $lockerId = ($entity->getLocker()) ? $entity->getLocker()->getId() : null;

        $form = $this->createForm(new StudentType(), $entity, array(
            'action' => $this->generateUrl('student_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'lockerId' => $lockerId
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        if (!$entity->getGraduated()) $form->remove('graduated');
        if (!$entity->getDropinfo()) $form->remove('dropInfo');

        return $form;
    }
    /**
     * Edits an existing Student entity.
     *
     * @Route("/{id}", name="student_update")
     * @Method("PUT")
     * @Template("RosterBundle:Student:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RosterBundle:Student')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice','Student updated successfully!');
            return $this->redirect($this->generateUrl('student_show', array('id' => $id)));
        }

        $this->get('session')->getFlashBag()->add('error','An error has ocurred while trying to update the student!');

        return array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Student entity.
     *
     * @Route("/delete/{id}", name="student_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('RosterBundle:Student')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('student'));
    }

    /**
     * Drops a Student entity.
     *
     * @Route("/drop/{id}", name="student_drop")
     * @Template("@Roster/Student/drop.html.twig")
     */
    public function dropAction(Request $request, $id){

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('RosterBundle:Student')->find($id);

        if ($entity->getDropInfo()) {
            throw $this->createNotFoundException('This student is already dropped.');
        }

        $dropInfo = new DropInfo();
        $form = $this->createForm(new DropInfoType(), $dropInfo);

        $form->handleRequest($request);

        if ($request->getMethod() == 'POST' ){

            $entity->setStatus(3); //--Dropped
            $entity->setDropInfo($dropInfo);
            $entity->setLocker(null);
            $em->persist($dropInfo);
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice','Student dropped successfully!');
            return $this->redirect($this->generateUrl('student'));

        }

        return array(
            'entity'   => $entity,
            'form'     => $form->createView(),
        );

    }

    /**
     * Graduate a Student entity.
     *
     * @Route("/graduate/{id}", name="student_graduate")
     * @Template("@Roster/Student/graduate.html.twig")
     */
    public function graduateAction(Request $request, $id){

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('RosterBundle:Student')->find($id);

        if ($entity->getGraduated()) {
            throw $this->createNotFoundException('This student is already graduated.');
        }

        $graduated = new Graduated();
        $form = $this->createForm(new GraduatedType(), $graduated);

        $form->handleRequest($request);

        if ($request->getMethod() == 'POST' ){

            $entity->setStatus(2); //--Graduated
            $entity->setGraduated($graduated);
            $entity->setLocker(null);
            $em->persist($graduated);
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice','Student graduated successfully!');
            return $this->redirect($this->generateUrl('student'));

        }

        return array(
            'entity'   => $entity,
            'form'     => $form->createView(),
        );

    }
}
