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
 * Class SocialEntityTrait
 *
 * @package Black\Bundle\CommonBundle\Traits
 */
trait SocialEntityTrait
{
    use SocialTrait;
    
    /**
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\Type(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(name="url", type="text")
     * @Assert\Url
     */
    protected $url;
}
