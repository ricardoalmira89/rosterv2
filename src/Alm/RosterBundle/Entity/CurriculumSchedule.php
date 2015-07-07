<?php

namespace Alm\RosterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Locker
 *
 * @ORM\Table(name="curriculum_schedule")
 * @ORM\Entity
 */
class CurriculumSchedule
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
     * @var /DateTime
     *
     * @ORM\Column(name="theory_from", type="datetime", nullable=true)
     */
    private $theoryFrom;

    /**
     * @var /DateTime
     *
     * @ORM\Column(name="theory_to", type="datetime", nullable=true)
     */
    private $theoryTo;

    /**
     * @var /DateTime
     *
     * @ORM\Column(name="practical_from", type="datetime", nullable=true)
     */
    private $practicalFrom;

    /**
     * @var /DateTime
     *
     * @ORM\Column(name="practical_to", type="datetime", nullable=true)
     */
    private $practicalTo;

    /**
     * @var /DateTime
     *
     * @ORM\Column(name="makeup_from", type="datetime", nullable=true)
     */
    private $makeupFrom;

    /**
     * @var /DateTime
     *
     * @ORM\Column(name="makeup_to", type="datetime", nullable=true)
     */
    private $makeupTo;

    /**
     * @var /DateTime
     *
     * @ORM\Column(name="clinic_from", type="datetime", nullable=true)
     */
    private $clinicFrom;

    /**
     * @var /DateTime
     *
     * @ORM\Column(name="clinic_to", type="datetime", nullable=true)
     */
    private $clinicTo;



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
     * Set theoryFrom
     *
     * @param \DateTime $theoryFrom
     * @return CurriculumSchedule
     */
    public function setTheoryFrom($theoryFrom)
    {
        $this->theoryFrom = $theoryFrom;

        return $this;
    }

    /**
     * Get theoryFrom
     *
     * @return \DateTime 
     */
    public function getTheoryFrom()
    {
        return $this->theoryFrom;
    }

    /**
     * Set theoryTo
     *
     * @param \DateTime $theoryTo
     * @return CurriculumSchedule
     */
    public function setTheoryTo($theoryTo)
    {
        $this->theoryTo = $theoryTo;

        return $this;
    }

    /**
     * Get theoryTo
     *
     * @return \DateTime 
     */
    public function getTheoryTo()
    {
        return $this->theoryTo;
    }

    /**
     * Set practicalFrom
     *
     * @param \DateTime $practicalFrom
     * @return CurriculumSchedule
     */
    public function setPracticalFrom($practicalFrom)
    {
        $this->practicalFrom = $practicalFrom;

        return $this;
    }

    /**
     * Get practicalFrom
     *
     * @return \DateTime 
     */
    public function getPracticalFrom()
    {
        return $this->practicalFrom;
    }

    /**
     * Set practicalTo
     *
     * @param \DateTime $practicalTo
     * @return CurriculumSchedule
     */
    public function setPracticalTo($practicalTo)
    {
        $this->practicalTo = $practicalTo;

        return $this;
    }

    /**
     * Get practicalTo
     *
     * @return \DateTime 
     */
    public function getPracticalTo()
    {
        return $this->practicalTo;
    }

    /**
     * Set makeupFrom
     *
     * @param \DateTime $makeupFrom
     * @return CurriculumSchedule
     */
    public function setMakeupFrom($makeupFrom)
    {
        $this->makeupFrom = $makeupFrom;

        return $this;
    }

    /**
     * Get makeupFrom
     *
     * @return \DateTime 
     */
    public function getMakeupFrom()
    {
        return $this->makeupFrom;
    }

    /**
     * Set makeupTo
     *
     * @param \DateTime $makeupTo
     * @return CurriculumSchedule
     */
    public function setMakeupTo($makeupTo)
    {
        $this->makeupTo = $makeupTo;

        return $this;
    }

    /**
     * Get makeupTo
     *
     * @return \DateTime 
     */
    public function getMakeupTo()
    {
        return $this->makeupTo;
    }

    /**
     * Set clinicFrom
     *
     * @param \DateTime $clinicFrom
     * @return CurriculumSchedule
     */
    public function setClinicFrom($clinicFrom)
    {
        $this->clinicFrom = $clinicFrom;

        return $this;
    }

    /**
     * Get clinicFrom
     *
     * @return \DateTime 
     */
    public function getClinicFrom()
    {
        return $this->clinicFrom;
    }

    /**
     * Set clinicTo
     *
     * @param \DateTime $clinicTo
     * @return CurriculumSchedule
     */
    public function setClinicTo($clinicTo)
    {
        $this->clinicTo = $clinicTo;

        return $this;
    }

    /**
     * Get clinicTo
     *
     * @return \DateTime 
     */
    public function getClinicTo()
    {
        return $this->clinicTo;
    }
}
