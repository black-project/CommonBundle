<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\CommonBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Black\Bundle\CommonBundle\Traits\ThingDocumentTrait;
use Black\Bundle\CommonBundle\Traits\ContactPointDocumentTrait;
use Black\Bundle\CommonBundle\Model\AbstractPostalAddress;

/**
 * @ODM\EmbeddedDocument
 */
class PostalAddress extends AbstractPostalAddress
{
    use ContactPointDocumentTrait;

    /**
     * @ODM\String
     * @Assert\Length(max="255")
     * @Assert\Type(type="string")
     */
    protected $name;

    /**
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $description;

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
