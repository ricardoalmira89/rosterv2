<?php

namespace Alm\RosterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DropInfo
 *
 * @ORM\Table(name="drop_info")
 * @ORM\Entity
 */
class DropInfo
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
     * @ORM\Column(name="refund", type="boolean", nullable=true)
     */
    private $refund;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer", nullable=true)
     */
    private $amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="cheque", type="string", length=255, nullable=true)
     */
    private $check;

    /**
     * @var boolean
     *
     * @ORM\Column(name="paid", type="boolean", nullable=true)
     */
    private $paid;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text",  nullable=true)
     */
    private $comments;





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
     * Set refund
     *
     * @param boolean $refund
     * @return DropInfo
     */
    public function setRefund($refund)
    {
        $this->refund = $refund;

        return $this;
    }

    /**
     * Get refund
     *
     * @return boolean 
     */
    public function getRefund()
    {
        return $this->refund;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     * @return DropInfo
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return DropInfo
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set check
     *
     * @param string $check
     * @return DropInfo
     */
    public function setCheck($check)
    {
        $this->check = $check;

        return $this;
    }

    /**
     * Get check
     *
     * @return string
     */
    public function getCheck()
    {
        return $this->check;
    }

    /**
     * Set paid
     *
     * @param boolean $paid
     * @return DropInfo
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * Get paid
     *
     * @return boolean 
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return DropInfo
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
}
