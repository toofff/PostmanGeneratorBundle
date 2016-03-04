<?php

/*
 * This file is part of the PostmanGeneratorBundle package.
 *
 * (c) Vincent Chalamon <vincentchalamon@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PostmanGeneratorBundle\Tests\Fixtures\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 *
 * @author Yann Prou <yann@les-tilleuls.coop>
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(length=255, unique=true)
     */
    protected $username;

    /**
     * @var string
     *
     * @ORM\Column
     */
    protected $password;

    /**
     * @var string
     *
     * @ORM\Column(length=255, unique=true)
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(length=255)
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(length=255)
     */
    protected $firtsName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date", nullable=true)
     */
    protected $updatedAt;
}
