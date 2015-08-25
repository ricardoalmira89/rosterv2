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
                'format' => 'MM/dd/yyyy',
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

    /**
     * @Route("/studentid/{id}", name="report_student_id")
     * @Template()
     */
    public function studentIdAction($id){

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
     * @Route("/excel", name="report_excel")
     */
    public function excelAction(){
        //student-layout.xls

        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('RosterBundle:Student')->findAll();

        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();
        $phpExcelObject->setActiveSheetIndex(0);
        $sheet = $phpExcelObject->getActiveSheet();

        $columnNames = array('CV#','First Name','Last Name','Home Phone','Cell Phone','Email','Address','City','State','Zip Code','Program','Schedule','E/O','Comments','Start Date','End Date','Enrollment Date','Plan Amount','FAFSA','Status','Locker','Location','Comments','Diploma Printed','CVS','Signed R. Form','Company Name','Start Working Date','Supervisor Phone','Printed Diploma Date','Employment Status','Job Title','Supervisor Name','Employeer Address','Licensed','Amount','Check','Date','Refund','Paid','Comments');

        $sheet->mergeCells('A1:J1')
            ->mergeCells('K1:Q1')
            ->mergeCells('R1:S1')
            ->mergeCells('T1:Z1')
            ->mergeCells('AA1:AI1')
            ->mergeCells('AJ1:AO1');

        $sheet->getCell('A1')->setValue('GENERAL INFORMATION');
        $sheet->getCell('K1')->setValue('ENROLLMENT INFORMATION');
        $sheet->getCell('R1')->setValue('FINANCIAL INFORMATION');
        $sheet->getCell('T1')->setValue('STUDENT SERVICES INFORMATION');
        $sheet->getCell('AA1')->setValue('GRADUATED INFORMATION');
        $sheet->getCell('AJ1')->setValue('DROP INFORMATION');

        $sheet->getStyle('A1:AO2')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:AO2')->getFont()->setBold(true);
        $sheet->getStyle('A1:AO2')->getBorders()->getAllBorders()->setBorderStyle(\PHPExcel_Style_Border::BORDER_THIN);

//        $sheet->getColumnDimension('A')->setAutoSize(true);
//        $sheet->getColumnDimension('B')->setAutoSize(true);

        for( $i=0; $i<=count($columnNames) - 1; $i++){
            $sheet->getCellByColumnAndRow($i, 2)->setValue($columnNames[$i]);
        }

        $i = 3;
        foreach ($entities as $entity) {
            $sheet->getCell('A'.$i)->setValue($entity->getCv());
            $sheet->getCell('B'.$i)->setValue($entity->getFirstName());
            $sheet->getCell('C'.$i)->setValue($entity->getLastName());
            $sheet->getCell('D'.$i)->setValue($entity->getHomePhone());
            $sheet->getCell('E'.$i)->setValue($entity->getCellPhone());
            $sheet->getCell('F'.$i)->setValue($entity->getEmail());
            $sheet->getCell('G'.$i)->setValue($entity->getAddress());
            $sheet->getCell('H'.$i)->setValue($entity->getCity());
            $sheet->getCell('I'.$i)->setValue($entity->getState());
            $sheet->getCell('J'.$i)->setValue($entity->getZip());
            $sheet->getCell('K'.$i)->setValue($entity->getProgramsText());
            $sheet->getCell('L'.$i)->setValue($entity->getSchedulesText());
            $sheet->getCell('M'.$i)->setValue($entity->getEO());
            $sheet->getCell('N'.$i)->setValue($entity->getComments());
            $sheet->getCell('O'.$i)->setValue(date_format($entity->getStartDate(),'Y/m/d'));
            $sheet->getCell('P'.$i)->setValue(date_format($entity->getEndDate(),'Y/m/d'));
            $sheet->getCell('Q'.$i)->setValue(date_format($entity->getEnrollmentDate(),'Y/m/d'));
            $sheet->getCell('R'.$i)->setValue($entity->getPaymentPlanAmount());
            $sheet->getCell('S'.$i)->setValue(($entity->getFafsa() == true) ? 'YES' : 'NO' );
            $sheet->getCell('T'.$i)->setValue($entity->getStatusText());
//            $sheet->getCell('U'.$i)->setValue($entity->getLocker());
            $sheet->getCell('V'.$i)->setValue($entity->getLocation());
            $sheet->getCell('W'.$i)->setValue($entity->getComments());
            $sheet->getCell('Y'.$i)->setValue(($entity->getCvs() == true) ? 'YES' : 'NO' );
            $sheet->getCell('Z'.$i)->setValue(($entity->getSignedRequest() == true) ? 'YES' : 'NO' );

            if ($entity->getGraduated()){

                if ($entity->getGraduated()->getDiplomaPrinted()) {
                    $sheet->getCell('X'.$i)->setValue(date_format($entity->getGraduated()->getDiplomaPrinted(),'Y/m/d'));
                    $sheet->getCell('AD'.$i)->setValue(date_format($entity->getGraduated()->getDiplomaPrinted(),'Y/m/d'));
                }
                if ($entity->getGraduated()->getStartWorking()) {
                    $sheet->getCell('AB'.$i)->setValue(date_format($entity->getGraduated()->getStartWorking(),'Y/m/d'));
                }

                $sheet->getCell('AA'.$i)->setValue($entity->getGraduated()->getCompanyName());
                $sheet->getCell('AC'.$i)->setValue($entity->getGraduated()->getSupervisorPhone());
                $sheet->getCell('AE'.$i)->setValue($entity->getGraduated()->getEmploymentStatus());
                $sheet->getCell('AF'.$i)->setValue($entity->getGraduated()->getJobTitle());
                $sheet->getCell('AG'.$i)->setValue($entity->getGraduated()->getSupervisorname());
                $sheet->getCell('AH'.$i)->setValue($entity->getGraduated()->getEmployerAddress());
                $sheet->getCell('AI'.$i)->setValue(($entity->getGraduated()->getLicensed() == true) ? 'YES' : 'NO' );
            }

            if ($entity->getDropInfo()){
                $sheet->getCell('AJ'.$i)->setValue($entity->getDropInfo()->getAmount());
                $sheet->getCell('AK'.$i)->setValue($entity->getDropInfo()->getCheck());
                $sheet->getCell('AL'.$i)->setValue(date_format($entity->getDropInfo()->getDate(),'Y/m/d'));
                $sheet->getCell('AM'.$i)->setValue($entity->getDropInfo()->getRefund());
                $sheet->getCell('AN'.$i)->setValue(($entity->getDropInfo()->getPaid() == true) ? 'YES' : 'NO' );
                $sheet->getCell('AO'.$i)->setValue($entity->getDropInfo()->getComments());
            }

            $i++;
        }


        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        $response = $this->get('phpexcel')->createStreamedResponse($writer);
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment;filename=students-layout.xls');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');

        return $response;

    }



}
