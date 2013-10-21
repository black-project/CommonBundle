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
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
interface PostalAddressInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getStreetAddress();

    /**
     * @return mixed
     */
    public function getComplementaryStreetAddress();

    /**
     * @return mixed
     */
    public function getPostalCode();

    /**
     * @return mixed
     */
    public function getPostOfficeBoxNumber();

    /**
     * @return mixed
     */
    public function getAddressRegion();

    /**
     * @return mixed
     */
    public function getAddressCountry();

    /**
     * @param $locale
     *
     * @return mixed
     */
    public function getAddressCountryLocale($locale);

    /**
     * @return mixed
     */
    public function getAddressLocality();
}
