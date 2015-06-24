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
     * @ORM\Column(name="check", type="string", length=255, nullable=true)
     */
    private $check;

    /**
     * @var boolean
     *
     * @ORM\Column(name="paid", type="boolean", nullable=true)
     */
    private $paid;


}
