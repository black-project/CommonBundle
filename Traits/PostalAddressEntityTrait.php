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
