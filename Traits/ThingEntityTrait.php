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

use Gedmo\Timestampable\Traits\TimestampableEntity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class ThingEntityTrait
 *
 * The most generic type of item.
 *
 * @package Black\Bundle\CommonBundle\Traits
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
trait ThingEntityTrait
{
    use TimestampableEntity;
    use ThingTrait;

    /**
     * A short description of the item
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     * @Assert\Type(type="string")
     */
    protected $description;

    /**
     * The name of the item
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\Length(max="255")
     * @Assert\Type(type="string")
     */
    protected $name;

    /**
     * The slug of the item
     *
     * @ORM\Column(length=255, unique=true)
     * @Assert\Length(max="255")
     * @Assert\Type(type="string")
     * @Gedmo\Slug(fields={"name"})
     */
    protected $slug;

    /**
     * URL of the item
     *
     * @ORM\Column(name="url", type="text", nullable=true)
     * @Assert\Url
     */
    protected $url;
}
