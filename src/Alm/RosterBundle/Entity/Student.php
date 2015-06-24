<?php

namespace Alm\RosterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table(name="student", indexes={@ORM\Index(name="fk_student_graduated", columns={"graduated_id"}), @ORM\Index(name="fk_student_enrollmentofficer", columns={"EO"}), @ORM\Index(name="fk_sudent_dropinfo", columns={"dropinfo_id"}), @ORM\Index(name="fk_student_locker", columns={"locker_id"})})
 * @ORM\Entity
 */
class Student
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime", nullable=false)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime", nullable=false)
     */
    private $endDate;

    /**
     * @var string
     *
     * @ORM\Column(name="home_phone", type="string", length=255, nullable=true)
     */
    private $homePhone;

    /**
     * @var string
     *
     * @ORM\Column(name="bussiness_phone", type="string", length=255, nullable=true)
     */
    private $bussinessPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="cell_phone", type="string", length=255, nullable=true)
     */
    private $cellPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="fax_number", type="string", length=255, nullable=true)
     */
    private $faxNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="blob", nullable=true)
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255, nullable=true)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="ZIP", type="string", length=255, nullable=true)
     */
    private $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="credit_trans", type="string", length=255, nullable=true)
     */
    private $creditTrans;

    /**
     * @var string
     *
     * @ORM\Column(name="refered", type="string", length=255, nullable=true)
     */
    private $refered;

    /**
     * @var string
     *
     * @ORM\Column(name="web_page", type="string", length=255, nullable=true)
     */
    private $webPage;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="string", length=255, nullable=true)
     */
    private $notes;

    /**
     * @var string
     *
     * @ORM\Column(name="attachment", type="string", length=255, nullable=true)
     */
    private $attachment;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=255, nullable=true)
     */
    private $comments;

    /**
     * @var string
     *
     * @ORM\Column(name="emergency_contact_name", type="string", length=255, nullable=true)
     */
    private $emergencyContactName;

    /**
     * @var string
     *
     * @ORM\Column(name="emergency_contact_phone1", type="string", length=255, nullable=true)
     */
    private $emergencyContactPhone1;

    /**
     * @var string
     *
     * @ORM\Column(name="emergency_contact_phone2", type="string", length=255, nullable=true)
     */
    private $emergencyContactPhone2;

    /**
     * @var string
     *
     * @ORM\Column(name="emergency_contact_phone3", type="string", length=255, nullable=true)
     */
    private $emergencyContactPhone3;

    /**
     * @var string
     *
     * @ORM\Column(name="cv", type="string", length=255, nullable=true)
     */
    private $cv;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cvs", type="boolean", nullable=true)
     */
    private $cvs;

    /**
     * @var string
     *
     * @ORM\Column(name="middle_initial", type="string", length=255, nullable=true)
     */
    private $middleInitial;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_info", type="string", length=255, nullable=true)
     */
    private $paymentInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_plan_amount", type="string", length=255, nullable=true)
     */
    private $paymentPlanAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="EO", type="string", length=255, nullable=true)
     */
    private $eo;

    /**
     * @var \Graduated
     *
     * @ORM\ManyToOne(targetEntity="Graduated")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="graduated_id", referencedColumnName="id")
     * })
     */
    private $graduated;

    /**
     * @var \Locker
     *
     * @ORM\ManyToOne(targetEntity="Locker")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="locker_id", referencedColumnName="id")
     * })
     */
    private $locker;

    /**
     * @var \DropInfo
     *
     * @ORM\ManyToOne(targetEntity="DropInfo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dropinfo_id", referencedColumnName="id")
     * })
     */
    private $dropinfo;


}
