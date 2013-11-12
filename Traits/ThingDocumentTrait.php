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
 * The most generic type of item.
 *
 * @package Black\Bundle\CommonBundle\Traits
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
trait ThingDocumentTrait
{
    use TimestampableDocument;
    use ThingTrait;

    /**
     * A short description of the item
     *
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $description;

    /**
     * The name of the item
     *
     * @ODM\String
     * @Assert\Length(max="255")
     * @Assert\Type(type="string")
     */
    protected $name;

    /**
     * The slug of the item
     *
     * @ODM\String
     * @Assert\Length(max="255")
     * @Assert\Type(type="string")
     * @Gedmo\Slug(fields={"name"})
     */
    protected $slug;

    /**
     * URL of the items
     *
     * @ODM\String
     * @Assert\Url
     */
    protected $url;
}
