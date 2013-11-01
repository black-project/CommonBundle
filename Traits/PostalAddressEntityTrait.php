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

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class PostalAddressEntityTrait
 *
 * @package Black\Bundle\CommonBundle\Traits
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
trait PostalAddressEntityTrait
{
    use PostalAddressTrait;

    /**
     * @ORM\Column(name="contact_type", type="string", length=255, nullable=true)
     * @Assert\Choice(callback = "getType")
     */
    protected $contactType;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\Length(max="255")
     * @Assert\Type(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(length=255, unique=true)
     * @Assert\Length(max="255")
     * @Assert\Type(type="string")
     * @Gedmo\Slug(fields={"name"})
     */
    protected $slug;

    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     * @Assert\Type(type="string")
     */
    protected $description;

    /**
     * @ORM\Column(name="street_address", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
    protected $streetAddress;

    /**
     * @ORM\Column(name="complementary_street_address", type="string", nullable=true)
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
