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
 * Class SocialDocumentTrait
 *
 * @package Black\Bundle\CommonBundle\Traits
 */
trait SocialDocumentTrait
{
    use SocialTrait;
    
    /**
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $name;

    /**
     * @ODM\String
     * @Assert\Url
     */
    protected $url;
}
