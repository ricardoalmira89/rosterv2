<?php

namespace Alm\RosterBundle\Controller;

use Alm\RosterBundle\Form\ProgramType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Reports controller.
 *
 * @Route("/reports")
 */
class ReportsController extends Controller
{

    /**
     * @Route("/attendance-sheet", name="report_attendance_sheet")
     * @Template()
     */
    public function attendanceSheetAction(Request $request){


        $em = $this->getDoctrine()->getManager();

        $form = $this->createFormBuilder()
            ->add('program', 'entity', array(
                'class' => 'Alm\RosterBundle\Entity\Program',
                'empty_value' => 'Select Program',
                'label' => ''
            ))
            ->add('schedule', 'entity', array(
                'class' => 'Alm\RosterBundle\Entity\Schedule',
                'empty_value' => 'Select Schedule'
            ))
            ->add('startDate', 'datetime',array(
                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd',
            ))
            ->getForm();

        $form->handleRequest($request);

        $entities = $em->getRepository('RosterBundle:Student')->findAll();

        if ($request->getMethod() == 'POST'){
            $entities = $em->getRepository('RosterBundle:Student')->reportAttendanceSheet(
                $form->get('program')->getData(),
                $form->get('schedule')->getData(),
                $form->get('startDate')->getData()
            );

        }


        return array(
            'entities' => $entities,
            'form' => $form->createView()
        );

    }



}
