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
 * Class PostalAddressDocumentTrait
 *
 * The mailing address
 *
 * @package Black\Bundle\CommonBundle\Traits
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
trait PostalAddressDocumentTrait
{
    use ContactPointDocumentTrait;
    use PostalAddressTrait;

    /**
     * The country
     *
     * @ODM\String
     * @Assert\Country
     */
    protected $addressCountry;

    /**
     * The locality
     *
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $addressLocality;

    /**
     * The region
     *
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $addressRegion;

    /**
     * The complementary street address
     *
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $complementaryStreetAddress;

    /**
     * The postal code
     *
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $postalCode;

    /**
     * The post offce box number for PO box addresses
     *
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $postOfficeBoxNumber;

    /**
     * The street address
     *
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $streetAddress;
}
