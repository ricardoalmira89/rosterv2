<?php

namespace Alm\RosterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Locker
 *
 * @ORM\Table(name="locker", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"})})
 * @ORM\Entity
 */
class Locker
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
     * @ORM\Column(name="name", type="string", length=3, nullable=false)
     */
    private $name;

    /**
     * @var Student
     * @ORM\OneToOne(targetEntity="Alm\RosterBundle\Entity\Student", mappedBy="locker", cascade={"persist"})
     */
    private $student;



    public function __toString(){
        return $this->name;
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
     * Set name
     *
     * @param string $name
     * @return Locker
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }




    /**
     * Set student
     *
     * @param \Alm\RosterBundle\Entity\Student $student
     * @return Locker
     */
    public function setStudent(\Alm\RosterBundle\Entity\Student $student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \Alm\RosterBundle\Entity\Student 
     */
    public function getStudent()
    {
        return $this->student;
    }
}
