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
 * The mailing address
 *
 * @package Black\Bundle\CommonBundle\Traits
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
trait PostalAddressEntityTrait
{
    use ContactPointEntityTrait;
    use PostalAddressTrait;

    /**
     * The country
     *
     * @ORM\Column(name="address_country", type="string", nullable=true)
     * @Assert\Country
     */
    protected $addressCountry;

    /**
     * The locality
     *
     * @ORM\Column(name="address_locality", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
    protected $addressLocality;

    /**
     * The region
     *
     * @ORM\Column(name="address_region", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
    protected $addressRegion;

    /**
     * The complementary street address
     *
     * @ORM\Column(name="complementary_street_address", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
    protected $complementaryStreetAddress;

    /**
     * The postal code
     *
     * @ORM\Column(name="postal_code", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
    protected $postalCode;

    /**
     * The post offce box number for PO box addresses
     *
     * @ORM\Column(name="post_office_box_number", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
    protected $postOfficeBoxNumber;

    /**
     * The street address
     *
     * @ORM\Column(name="street_address", type="string", nullable=true)
     * @Assert\Type(type="string")
     */
    protected $streetAddress;
}
