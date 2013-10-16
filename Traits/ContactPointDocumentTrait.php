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
 * Class ContactPointDocumentTrait
 *
 * @package Black\Bundle\CommonBundle\Traits
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
trait ContactPointDocumentTrait
{
    use ContactPointTrait;
    
    /**
     * @ODM\String
     * @Assert\Choice(callback = "getType")
     */
    protected $contactType;

    /**
     * @ODM\String
     * @ODM\UniqueIndex
     * @Assert\Type(type="string")
     * @Assert\Email()
     */
    protected $email;

    /**
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $faxNumber;

    /**
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $telephone;

    /**
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $mobile;
}
