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

use Gedmo\Timestampable\Traits\TimestampableDocument;

/**
 * Class ThingDocumentTrait
 *
 * @package Black\Bundle\CommonBundle\Traits
 */
trait ThingDocumentTrait
{
    use TimestampableDocument;
    use ThingTrait;

    /**
     * @ODM\String
     * @Assert\Length(max="255")
     * @Assert\Type(type="string")
     */
    protected $name;

    /**
     * @ODM\String
     * @Assert\Length(max="255")
     * @Assert\Type(type="string")
     * @Gedmo\Slug(fields={"name"})
     */
    protected $slug;

    /**
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $description;

    /**
     * @ODM\String
     * @Assert\Url
     */
    protected $url;
}
