<?php

namespace Alm\RosterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Graduated
 *
 * @ORM\Table(name="graduated")
 * @ORM\Entity
 */
class Graduated
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
     * @var boolean
     *
     * @ORM\Column(name="licensed", type="boolean", nullable=true)
     */
    private $licensed;

    /**
     * @var boolean
     *
     * @ORM\Column(name="temporary", type="boolean", nullable=true)
     */
    private $temporary;

    /**
     * @var string
     *
     * @ORM\Column(name="employment_status", type="string", length=255, nullable=true)
     */
    private $employmentStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="company_name", type="string", length=255, nullable=true)
     */
    private $companyName;

    /**
     * @var string
     *
     * @ORM\Column(name="company_address", type="string", length=255, nullable=true)
     */
    private $companyAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="company_city", type="string", length=255, nullable=true)
     */
    private $companyCity;

    /**
     * @var string
     *
     * @ORM\Column(name="company_state", type="string", length=255, nullable=true)
     */
    private $companyState;

    /**
     * @var string
     *
     * @ORM\Column(name="company_zip", type="string", length=255, nullable=true)
     */
    private $companyZip;

    /**
     * @var string
     *
     * @ORM\Column(name="company_phone", type="string", length=255, nullable=true)
     */
    private $companyPhone;

    /**
     * @var boolean
     *
     * @ORM\Column(name="full_time", type="boolean", nullable=true)
     */
    private $fullTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="diploma_printed", type="date", nullable=true)
     */
    private $diplomaPrinted;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="diploma_received", type="boolean", nullable=true)
     */
    private $diplomaReceived;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_working", type="date", nullable=true)
     */
    private $startWorking;

    /**
     * @var string
     *
     * @ORM\Column(name="supervisor_phone", type="string", length=255, nullable=true)
     */
    private $supervisorPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="supervisor_name", type="string", length=255, nullable=true)
     */
    private $supervisorName;

    /**
     * @var string
     *
     * @ORM\Column(name="job_title", type="string", length=255, nullable=true)
     */
    private $jobTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="employer_address", type="string", length=255, nullable=true)
     */
    private $employerAddress;



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
     * Set licensed
     *
     * @param boolean $licensed
     * @return Graduated
     */
    public function setLicensed($licensed)
    {
        $this->licensed = $licensed;

        return $this;
    }

    /**
     * Get licensed
     *
     * @return boolean 
     */
    public function getLicensed()
    {
        return $this->licensed;
    }

    /**
     * Set temporary
     *
     * @param boolean $temporary
     * @return Graduated
     */
    public function setTemporary($temporary)
    {
        $this->temporary = $temporary;

        return $this;
    }

    /**
     * Get temporary
     *
     * @return boolean 
     */
    public function getTemporary()
    {
        return $this->temporary;
    }

    /**
     * Set employmentStatus
     *
     * @param string $employmentStatus
     * @return Graduated
     */
    public function setEmploymentStatus($employmentStatus)
    {
        $this->employmentStatus = $employmentStatus;

        return $this;
    }

    /**
     * Get employmentStatus
     *
     * @return string 
     */
    public function getEmploymentStatus()
    {
        return $this->employmentStatus;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     * @return Graduated
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Get companyName
     *
     * @return string 
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Set companyAddress
     *
     * @param string $companyAddress
     * @return Graduated
     */
    public function setCompanyAddress($companyAddress)
    {
        $this->companyAddress = $companyAddress;

        return $this;
    }

    /**
     * Get companyAddress
     *
     * @return string 
     */
    public function getCompanyAddress()
    {
        return $this->companyAddress;
    }

    /**
     * Set companyCity
     *
     * @param string $companyCity
     * @return Graduated
     */
    public function setCompanyCity($companyCity)
    {
        $this->companyCity = $companyCity;

        return $this;
    }

    /**
     * Get companyCity
     *
     * @return string 
     */
    public function getCompanyCity()
    {
        return $this->companyCity;
    }

    /**
     * Set companyState
     *
     * @param string $companyState
     * @return Graduated
     */
    public function setCompanyState($companyState)
    {
        $this->companyState = $companyState;

        return $this;
    }

    /**
     * Get companyState
     *
     * @return string 
     */
    public function getCompanyState()
    {
        return $this->companyState;
    }

    /**
     * Set companyZip
     *
     * @param string $companyZip
     * @return Graduated
     */
    public function setCompanyZip($companyZip)
    {
        $this->companyZip = $companyZip;

        return $this;
    }

    /**
     * Get companyZip
     *
     * @return string 
     */
    public function getCompanyZip()
    {
        return $this->companyZip;
    }

    /**
     * Set companyPhone
     *
     * @param string $companyPhone
     * @return Graduated
     */
    public function setCompanyPhone($companyPhone)
    {
        $this->companyPhone = $companyPhone;

        return $this;
    }

    /**
     * Get companyPhone
     *
     * @return string 
     */
    public function getCompanyPhone()
    {
        return $this->companyPhone;
    }

    /**
     * Set fullTime
     *
     * @param boolean $fullTime
     * @return Graduated
     */
    public function setFullTime($fullTime)
    {
        $this->fullTime = $fullTime;

        return $this;
    }

    /**
     * Get fullTime
     *
     * @return boolean 
     */
    public function getFullTime()
    {
        return $this->fullTime;
    }

    /**
     * Set diplomaPrinted
     *
     * @param \DateTime $diplomaPrinted
     * @return Graduated
     */
    public function setDiplomaPrinted($diplomaPrinted)
    {
        $this->diplomaPrinted = $diplomaPrinted;

        return $this;
    }

    /**
     * Get diplomaPrinted
     *
     * @return \DateTime 
     */
    public function getDiplomaPrinted()
    {
        return $this->diplomaPrinted;
    }

    /**
     * Set startWorking
     *
     * @param \DateTime $startWorking
     * @return Graduated
     */
    public function setStartWorking($startWorking)
    {
        $this->startWorking = $startWorking;

        return $this;
    }

    /**
     * Get startWorking
     *
     * @return \DateTime 
     */
    public function getStartWorking()
    {
        return $this->startWorking;
    }

    /**
     * Set supervisorPhone
     *
     * @param string $supervisorPhone
     * @return Graduated
     */
    public function setSupervisorPhone($supervisorPhone)
    {
        $this->supervisorPhone = $supervisorPhone;

        return $this;
    }

    /**
     * Get supervisorPhone
     *
     * @return string 
     */
    public function getSupervisorPhone()
    {
        return $this->supervisorPhone;
    }

    /**
     * Set supervisorName
     *
     * @param string $supervisorName
     * @return Graduated
     */
    public function setSupervisorName($supervisorName)
    {
        $this->supervisorName = $supervisorName;

        return $this;
    }

    /**
     * Get supervisorName
     *
     * @return string 
     */
    public function getSupervisorName()
    {
        return $this->supervisorName;
    }

    /**
     * Set jobTitle
     *
     * @param string $jobTitle
     * @return Graduated
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * Get jobTitle
     *
     * @return string 
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * Set employerAddress
     *
     * @param string $employerAddress
     * @return Graduated
     */
    public function setEmployerAddress($employerAddress)
    {
        $this->employerAddress = $employerAddress;

        return $this;
    }

    /**
     * Get employerAddress
     *
     * @return string 
     */
    public function getEmployerAddress()
    {
        return $this->employerAddress;
    }



    /**
     * Set diplomaReceived
     *
     * @param boolean $diplomaReceived
     * @return Graduated
     */
    public function setDiplomaReceived($diplomaReceived)
    {
        $this->diplomaReceived = $diplomaReceived;

        return $this;
    }

    /**
     * Get diplomaReceived
     *
     * @return boolean 
     */
    public function getDiplomaReceived()
    {
        return $this->diplomaReceived;
    }
}
