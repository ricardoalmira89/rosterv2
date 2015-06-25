<?php

namespace Alm\RosterBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Ajax controller.
 *
 * @Route("/ajax")
 */
class AjaxController extends Controller
{

    /**
     * @Route("/schedules", name="ajax_schedules")
     * @Method("GET")
     */
    public function getSchedulesAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $ids = split(',',$request->get('schedulesIds'));
        $schedules = $em->getRepository('RosterBundle:Schedule')->getSchedules($ids);

        return  new JsonResponse(json_encode(array('schedules' => $schedules)));
    }

    /**
     * @Route("/schedules2", name="ajax_schedules2")
     * @Method("GET")
     */
    public function getSchedules2Action(Request $request){

        $em = $this->getDoctrine()->getManager();
        $schedules = $em->getRepository('RosterBundle:Schedule')->getSchedules2($request->get('program'));

        return  new JsonResponse(json_encode(array('schedules' => $schedules )));
    }



}
