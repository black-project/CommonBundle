<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Black\Bundle\CommonBundle\Traits\ContactPointEntityTrait;
use Black\Bundle\CommonBundle\Model\AbstractPostalAddress;

/**
 * Class PostalAddress
 *
 * @package Black\Bundle\CommonBundle\Entity
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
abstract class PostalAddress extends AbstractPostalAddress
{
    use ContactPointEntityTrait;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     * @Assert\Length(max="255")
     * @Assert\Type(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(name="description", type="text", length=255, nullable=true)
     * @Assert\Type(type="string")
     */
    protected $description;

    /**
     * @ORM\Column(name="street_address", type="text", nullable=true)
     * @Assert\Type(type="string")
     */
    protected $streetAddress;

    /**
     * @ORM\Column(name="complementary_street_address", type="text", nullable=true)
     * @Assert\Type(type="string")
     */
    protected $complementaryStreetAddress;

    /**
     * @ORM\Column(name="postal_code", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
    protected $postalCode;

    /**
     * @ORM\Column(name="post_office_box_number", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
    protected $postOfficeBoxNumber;

    /**
     * @ORM\Column(name="address_country", type="string", nullable=true)
     * @Assert\Country
     */
    protected $addressCountry;


    /**
     * @ORM\Column(name="address_locality", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
    protected $addressLocality;


    /**
     * @ORM\Column(name="address_region", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
    protected $addressRegion;
}
