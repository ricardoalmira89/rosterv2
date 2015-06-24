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

    /**
     * @ORM\ManyToMany(targetEntity="Alm\RosterBundle\Entity\Schedule", cascade={"persist"})
     * @ORM\JoinTable(name="student_schedule",
     *      joinColumns={@ORM\JoinColumn(name="student_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="schedule_id", referencedColumnName="id", onDelete="CASCADE")}
     * )
     */
    private $schedules;

    /**
     * @ORM\ManyToMany(targetEntity="Alm\RosterBundle\Entity\Program", cascade={"persist"})
     * @ORM\JoinTable(name="student_program",
     *      joinColumns={@ORM\JoinColumn(name="student_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="program_id", referencedColumnName="id", onDelete="CASCADE")}
     * )
     */
    private $programs;


    public function __toString(){
        return $this->firstName.' '.$this->lastName;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->schedules = new \Doctrine\Common\Collections\ArrayCollection();
        $this->programs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Student
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Student
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Student
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Student
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Student
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set homePhone
     *
     * @param string $homePhone
     * @return Student
     */
    public function setHomePhone($homePhone)
    {
        $this->homePhone = $homePhone;

        return $this;
    }

    /**
     * Get homePhone
     *
     * @return string 
     */
    public function getHomePhone()
    {
        return $this->homePhone;
    }

    /**
     * Set bussinessPhone
     *
     * @param string $bussinessPhone
     * @return Student
     */
    public function setBussinessPhone($bussinessPhone)
    {
        $this->bussinessPhone = $bussinessPhone;

        return $this;
    }

    /**
     * Get bussinessPhone
     *
     * @return string 
     */
    public function getBussinessPhone()
    {
        return $this->bussinessPhone;
    }

    /**
     * Set cellPhone
     *
     * @param string $cellPhone
     * @return Student
     */
    public function setCellPhone($cellPhone)
    {
        $this->cellPhone = $cellPhone;

        return $this;
    }

    /**
     * Get cellPhone
     *
     * @return string 
     */
    public function getCellPhone()
    {
        return $this->cellPhone;
    }

    /**
     * Set faxNumber
     *
     * @param string $faxNumber
     * @return Student
     */
    public function setFaxNumber($faxNumber)
    {
        $this->faxNumber = $faxNumber;

        return $this;
    }

    /**
     * Get faxNumber
     *
     * @return string 
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return Student
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Student
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Student
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Student
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set zip
     *
     * @param string $zip
     * @return Student
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return string 
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Student
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set creditTrans
     *
     * @param string $creditTrans
     * @return Student
     */
    public function setCreditTrans($creditTrans)
    {
        $this->creditTrans = $creditTrans;

        return $this;
    }

    /**
     * Get creditTrans
     *
     * @return string 
     */
    public function getCreditTrans()
    {
        return $this->creditTrans;
    }

    /**
     * Set refered
     *
     * @param string $refered
     * @return Student
     */
    public function setRefered($refered)
    {
        $this->refered = $refered;

        return $this;
    }

    /**
     * Get refered
     *
     * @return string 
     */
    public function getRefered()
    {
        return $this->refered;
    }

    /**
     * Set webPage
     *
     * @param string $webPage
     * @return Student
     */
    public function setWebPage($webPage)
    {
        $this->webPage = $webPage;

        return $this;
    }

    /**
     * Get webPage
     *
     * @return string 
     */
    public function getWebPage()
    {
        return $this->webPage;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return Student
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set attachment
     *
     * @param string $attachment
     * @return Student
     */
    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;

        return $this;
    }

    /**
     * Get attachment
     *
     * @return string 
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Student
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Student
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Student
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set emergencyContactName
     *
     * @param string $emergencyContactName
     * @return Student
     */
    public function setEmergencyContactName($emergencyContactName)
    {
        $this->emergencyContactName = $emergencyContactName;

        return $this;
    }

    /**
     * Get emergencyContactName
     *
     * @return string 
     */
    public function getEmergencyContactName()
    {
        return $this->emergencyContactName;
    }

    /**
     * Set emergencyContactPhone1
     *
     * @param string $emergencyContactPhone1
     * @return Student
     */
    public function setEmergencyContactPhone1($emergencyContactPhone1)
    {
        $this->emergencyContactPhone1 = $emergencyContactPhone1;

        return $this;
    }

    /**
     * Get emergencyContactPhone1
     *
     * @return string 
     */
    public function getEmergencyContactPhone1()
    {
        return $this->emergencyContactPhone1;
    }

    /**
     * Set emergencyContactPhone2
     *
     * @param string $emergencyContactPhone2
     * @return Student
     */
    public function setEmergencyContactPhone2($emergencyContactPhone2)
    {
        $this->emergencyContactPhone2 = $emergencyContactPhone2;

        return $this;
    }

    /**
     * Get emergencyContactPhone2
     *
     * @return string 
     */
    public function getEmergencyContactPhone2()
    {
        return $this->emergencyContactPhone2;
    }

    /**
     * Set emergencyContactPhone3
     *
     * @param string $emergencyContactPhone3
     * @return Student
     */
    public function setEmergencyContactPhone3($emergencyContactPhone3)
    {
        $this->emergencyContactPhone3 = $emergencyContactPhone3;

        return $this;
    }

    /**
     * Get emergencyContactPhone3
     *
     * @return string 
     */
    public function getEmergencyContactPhone3()
    {
        return $this->emergencyContactPhone3;
    }

    /**
     * Set cv
     *
     * @param string $cv
     * @return Student
     */
    public function setCv($cv)
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * Get cv
     *
     * @return string 
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * Set cvs
     *
     * @param boolean $cvs
     * @return Student
     */
    public function setCvs($cvs)
    {
        $this->cvs = $cvs;

        return $this;
    }

    /**
     * Get cvs
     *
     * @return boolean 
     */
    public function getCvs()
    {
        return $this->cvs;
    }

    /**
     * Set middleInitial
     *
     * @param string $middleInitial
     * @return Student
     */
    public function setMiddleInitial($middleInitial)
    {
        $this->middleInitial = $middleInitial;

        return $this;
    }

    /**
     * Get middleInitial
     *
     * @return string 
     */
    public function getMiddleInitial()
    {
        return $this->middleInitial;
    }

    /**
     * Set paymentInfo
     *
     * @param string $paymentInfo
     * @return Student
     */
    public function setPaymentInfo($paymentInfo)
    {
        $this->paymentInfo = $paymentInfo;

        return $this;
    }

    /**
     * Get paymentInfo
     *
     * @return string 
     */
    public function getPaymentInfo()
    {
        return $this->paymentInfo;
    }

    /**
     * Set paymentPlanAmount
     *
     * @param string $paymentPlanAmount
     * @return Student
     */
    public function setPaymentPlanAmount($paymentPlanAmount)
    {
        $this->paymentPlanAmount = $paymentPlanAmount;

        return $this;
    }

    /**
     * Get paymentPlanAmount
     *
     * @return string 
     */
    public function getPaymentPlanAmount()
    {
        return $this->paymentPlanAmount;
    }

    /**
     * Set eo
     *
     * @param string $eo
     * @return Student
     */
    public function setEo($eo)
    {
        $this->eo = $eo;

        return $this;
    }

    /**
     * Get eo
     *
     * @return string 
     */
    public function getEo()
    {
        return $this->eo;
    }

    /**
     * Set graduated
     *
     * @param \Alm\RosterBundle\Entity\Graduated $graduated
     * @return Student
     */
    public function setGraduated(\Alm\RosterBundle\Entity\Graduated $graduated = null)
    {
        $this->graduated = $graduated;

        return $this;
    }

    /**
     * Get graduated
     *
     * @return \Alm\RosterBundle\Entity\Graduated 
     */
    public function getGraduated()
    {
        return $this->graduated;
    }

    /**
     * Set locker
     *
     * @param \Alm\RosterBundle\Entity\Locker $locker
     * @return Student
     */
    public function setLocker(\Alm\RosterBundle\Entity\Locker $locker = null)
    {
        $this->locker = $locker;

        return $this;
    }

    /**
     * Get locker
     *
     * @return \Alm\RosterBundle\Entity\Locker 
     */
    public function getLocker()
    {
        return $this->locker;
    }

    /**
     * Set dropinfo
     *
     * @param \Alm\RosterBundle\Entity\DropInfo $dropinfo
     * @return Student
     */
    public function setDropinfo(\Alm\RosterBundle\Entity\DropInfo $dropinfo = null)
    {
        $this->dropinfo = $dropinfo;

        return $this;
    }

    /**
     * Get dropinfo
     *
     * @return \Alm\RosterBundle\Entity\DropInfo 
     */
    public function getDropinfo()
    {
        return $this->dropinfo;
    }

    /**
     * Add schedules
     *
     * @param \Alm\RosterBundle\Entity\Schedule $schedules
     * @return Student
     */
    public function addSchedule(\Alm\RosterBundle\Entity\Schedule $schedules)
    {
        $this->schedules[] = $schedules;

        return $this;
    }

    /**
     * Remove schedules
     *
     * @param \Alm\RosterBundle\Entity\Schedule $schedules
     */
    public function removeSchedule(\Alm\RosterBundle\Entity\Schedule $schedules)
    {
        $this->schedules->removeElement($schedules);
    }

    /**
     * Get schedules
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSchedules()
    {
        return $this->schedules;
    }

    /**
     * Add programs
     *
     * @param \Alm\RosterBundle\Entity\Program $programs
     * @return Student
     */
    public function addProgram(\Alm\RosterBundle\Entity\Program $programs)
    {
        $this->programs[] = $programs;

        return $this;
    }

    /**
     * Remove programs
     *
     * @param \Alm\RosterBundle\Entity\Program $programs
     */
    public function removeProgram(\Alm\RosterBundle\Entity\Program $programs)
    {
        $this->programs->removeElement($programs);
    }

    /**
     * Get programs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrograms()
    {
        return $this->programs;
    }

    public function getProgramsText(){
        return 'programs/here';
    }

    public function getSchedulesText(){
        return 'schedules/here';
    }
}
