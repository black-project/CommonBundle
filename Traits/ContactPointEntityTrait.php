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
 * A contact point—for example, a Customer Complaints department
 *
 * @package Black\Bundle\CommonBundle\Traits
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
trait ContactPointEntityTrait
{
    use ThingEntityTrait;
    use ContactPointTrait;
    
    /**
     * A person or organization can have different contact points, for different
     * purposes. For example, a sales contact point, a PR contact point and so
     * on. This property is used to specify the kind of contact point
     *
     * @ORM\Column(name="contact_type", type="string", length=255, nullable=true)
     * @Assert\Choice(callback = "getType")
     */
    protected $contactType;

    /**
     * Email address
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     * @Assert\Type(type="string")
     * @Assert\Email()
     */
    protected $email;

    /**
     * The fax number
     *
     * @ORM\Column(name="fax_number", type="string", length=255, nullable=true)
     * @Assert\Type(type="string")
     */
    protected $faxNumber;

    /**
     * The mobile number
     *
     * @ORM\Column(name="mobile", type="string", length=255, nullable=true)
     * @Assert\Type(type="string")
     */
    protected $mobile;

    /**
     * The telephone number
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     * @Assert\Type(type="string")
     */
    protected $telephone;
}
