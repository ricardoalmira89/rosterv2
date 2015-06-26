<?php

namespace Alm\RosterBundle\Controller;

use Alm\RosterBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Alm\RosterBundle\Entity\User;
use Symfony\Component\Validator\Constraints\Email;

/**
 * User controller.
 *
 * @Route("/user")
 */
class UserController extends Controller
{

    /**
     * Lists all Usuario entities.
     *
     * @Route("/list", name="usuario")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('RosterBundle:User')->findAll();

        return array(
            'pagination' => $this->get('knp_paginator')->paginate($entities, $this->get('request')->query->get('page', 1), 15),
        );
    }

    /**
     * Finds and displays a Usuario entity.
     *
     * @Route("/{id}", name="usuario_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RosterBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Usuario entity.
     *
     * @Route("/{id}/edit", name="usuario_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RosterBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $editForm = $this->createForm(new UserType(), $entity);



        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Usuario entity.
     *
     * @Route("/{id}", name="usuario_update")
     * @Method("PUT")
     * @Template("RosterBundle:User:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RosterBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new UserType(), $entity);
        $editForm->bind($request);

        $emailValidator = new Email();
        $errorList = $this->get('validator')->validateValue($entity->getEmail(), $emailValidator);

        if(count($errorList)>0){
            $this->get('session')->getFlashBag()->add('error', 'Incorrect email address');
        } else {
            if ($editForm->isValid()) {

//            $factory = $this->get('security.encoder_factory');
//            $encoder = $factory->getEncoder($entity);
//            $password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
//            $entity->setPassword($password);

                $em->persist($entity);
                $em->flush();

                $this->get('session')->getFlashBag()->add('notice', 'User updated successfully!');

                return $this->redirect($this->generateUrl('usuario'));
            }
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Usuario entity.
     *
     * @Route("/del/{id}", name="usuario_delete")
     */
    public function deleteAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RosterBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Usuario entity.');
            }

            $em->remove($entity);
            $em->flush();

        return $this->redirect($this->generateUrl('usuario'));
    }

    /**
     * Creates a form to delete a Usuario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }

    /**
     *
     * @Route("/change-password/{id}", name="usuario_change_password")
     */
    public function changePasswordAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('RosterBundle:User')->find($id);
        $form = $this->createFormBuilder()
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'first_options' => array('label' => 'Contraseña'),
                'second_options' => array('label' => 'Repita'),
            ))->getForm()
        ;

        if ($request->getMethod()=='POST'){
            $form->handleRequest($request);
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($entity);
            $password = $encoder->encodePassword($form->get('plainPassword')->getData(), $entity->getSalt());
            $entity->setPassword($password);

            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Password updated successfully');

            return $this->redirect($this->generateUrl('usuario'));
        }

        return $this->render('@Roster/User/change-password.html.twig', array('form' => $form->createView(), 'entity' => $entity));

    }

}
