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
 * Class PostalAddressTrait
 *
 * @package Black\Bundle\CommonBundle\Traits
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
trait PostalAddressTrait
{
    /**
     * @return array
     */
    public function getType()
    {
        return array('P', 'H', 'W', 'O');
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $slug
     *
     * @return $this
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $contactType
     *
     * @return $this
     */
    public function setContactType($contactType)
    {
        $this->contactType = $contactType;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContactType()
    {
        return $this->contactType;
    }

    /**
     * @param $streetAddress
     *
     * @return $this
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * @param $complementaryStreetAddress
     *
     * @return $this
     */
    public function setComplementaryStreetAddress($complementaryStreetAddress)
    {
        $this->complementaryStreetAddress = $complementaryStreetAddress;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getComplementaryStreetAddress()
    {
        return $this->complementaryStreetAddress;
    }

    /**
     * @param $postalCode
     *
     * @return $this
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param $postOfficeBoxNumber
     *
     * @return $this
     */
    public function setPostOfficeBoxNumber($postOfficeBoxNumber)
    {
        $this->postOfficeBoxNumber = $postOfficeBoxNumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostOfficeBoxNumber()
    {
        return $this->postOfficeBoxNumber;
    }

    /**
     * @param $addressRegion
     *
     * @return $this
     */
    public function setAddressRegion($addressRegion)
    {
        $this->addressRegion = $addressRegion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressRegion()
    {
        return $this->addressRegion;
    }

    /**
     * @param $addressCountry
     *
     * @return $this
     */
    public function setAddressCountry($addressCountry)
    {
        $this->addressCountry = $addressCountry;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressCountry()
    {
        return $this->addressCountry;
    }

    /**
     * @param string $locale
     *
     * @return mixed
     */
    public function getAddressCountryLocale($locale = 'en')
    {
        $c = Intl::getRegionBundle()->getCountryNames($locale);
        return array_key_exists($this->addressCountry, $c)? $c[$this->addressCountry]: $this->addressCountry;
    }

    /**
     * @param $addressLocality
     *
     * @return $this
     */
    public function setAddressLocality($addressLocality)
    {
        $this->addressLocality = $addressLocality;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressLocality()
    {
        return $this->addressLocality;
    }
}
