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

/**
 * Class PostalAddressInterface
 *
 * @package Black\Bundle\CommonBundle\Model
 */
interface PostalAddressInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $streetAddress
     *
     * @return mixed
     */
    public function setStreetAddress($streetAddress);

    /**
     * @return mixed
     */
    public function getStreetAddress();

    /**
     * @param $complementaryStreetAddress
     *
     * @return mixed
     */
    public function setComplementaryStreetAddress($complementaryStreetAddress);

    /**
     * @return mixed
     */
    public function getComplementaryStreetAddress();

    /**
     * @param $postalCode
     *
     * @return mixed
     */
    public function setPostalCode($postalCode);

    /**
     * @return mixed
     */
    public function getPostalCode();

    /**
     * @param $postOfficeBoxNumber
     *
     * @return mixed
     */
    public function setPostOfficeBoxNumber($postOfficeBoxNumber);

    /**
     * @return mixed
     */
    public function getPostOfficeBoxNumber();

    /**
     * @param $addressRegion
     *
     * @return mixed
     */
    public function setAddressRegion($addressRegion);

    /**
     * @return mixed
     */
    public function getAddressRegion();

    /**
     * @param $addressCountry
     *
     * @return mixed
     */
    public function setAddressCountry($addressCountry);

    /**
     * @return mixed
     */
    public function getAddressCountry();
    
    /**
     * @return mixed
     */
    public function getAddressCountryLocale($locale);

    /**
     * @param $addressLocality
     *
     * @return mixed
     */
    public function setAddressLocality($addressLocality);

    /**
     * @return mixed
     */
    public function getAddressLocality();
}
