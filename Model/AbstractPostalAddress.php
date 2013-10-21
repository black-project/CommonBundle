<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Model;

use \Symfony\Component\Intl\Intl;

/**
 * Class AbstractPostalAddress
 *
 * @package Black\Bundle\CommonBundle\Model
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
abstract class AbstractPostalAddress implements PostalAddressInterface
{
    /**
     * @var
     */
    protected $name;

    /**
     * @var
     */
    protected $description;
    /**
     * @var
     */
    protected $streetAddress;

    /**
     * @var
     */
    protected $complementaryStreetAddress;

    /**
     * @var
     */
    protected $postalCode;

    /**
     * @var
     */
    protected $postOfficeBoxNumber;

    /**
     * @var
     */
    protected $addressRegion;

    /**
     * @var
     */
    protected $addressCountry;

    /**
     * @var
     */
    protected $addressLocality;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
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
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * {@inheritdoc}
     */
    public function setComplementaryStreetAddress($complementaryStreetAddress)
    {
        $this->complementaryStreetAddress = $complementaryStreetAddress;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getComplementaryStreetAddress()
    {
        return $this->complementaryStreetAddress;
    }

    /**
     * {@inheritdoc}
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setPostOfficeBoxNumber($postOfficeBoxNumber)
    {
        $this->postOfficeBoxNumber = $postOfficeBoxNumber;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPostOfficeBoxNumber()
    {
        return $this->postOfficeBoxNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setAddressRegion($addressRegion)
    {
        $this->addressRegion = $addressRegion;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAddressRegion()
    {
        return $this->addressRegion;
    }

    /**
     * {@inheritdoc}
     */
    public function setAddressCountry($addressCountry)
    {
        $this->addressCountry = $addressCountry;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAddressCountry()
    {
        return $this->addressCountry;
    }

    /**
     * {@inheritdoc}
     */
    public function getAddressCountryLocale($locale = 'en')
    {
        $c = Intl::getRegionBundle()->getCountryNames($locale);
        return array_key_exists($this->addressCountry, $c)? $c[$this->addressCountry]: $this->addressCountry;
    }

    /**
     * {@inheritdoc}
     */
    public function setAddressLocality($addressLocality)
    {
        $this->addressLocality = $addressLocality;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAddressLocality()
    {
        return $this->addressLocality;
    }
}
