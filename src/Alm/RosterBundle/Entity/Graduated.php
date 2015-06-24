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


}
