<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\CommonBundle\Traits;

/**
 * Class ContactPointEntityTrait
 *
 * @package Black\Bundle\CommonBundle\Traits
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
trait ContactPointEntityTrait
{
    use ContactPointTrait;
    
    /**
     * @ORM\Column(name="contact_type", type="string", length=255, nullable=true)
     * @Assert\Choice(callback = "getType")
     */
    protected $contactType;

    /**
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     * @Assert\Type(type="string")
     * @Assert\Email()
     */
    protected $email;

    /**
     * @ORM\Column(name="fax_number", type="string", length=255, nullable=true)
     * @Assert\Type(type="string")
     */
    protected $faxNumber;

    /**
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     * @Assert\Type(type="string")
     */
    protected $telephone;

    /**
     * @ORM\Column(name="mobile", type="string", length=255, nullable=true)
     * @Assert\Type(type="string")
     */
    protected $mobile;
}
