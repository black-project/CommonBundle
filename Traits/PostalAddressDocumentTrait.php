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
 * @package Black\Bundle\CommonBundle\Traits
 */
trait PostalAddressDocumentTrait
{
    use PostalAddressTrait;
    
    /**
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $streetAddress;

    /**
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $complementaryStreetAddress;

    /**
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $postalCode;

    /**
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $postOfficeBoxNumber;

    /**
     * @ODM\String
     * @Assert\Country
     */
    protected $addressCountry;

    /**
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $addressLocality;

    /**
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $addressRegion;
}
