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
 * A contact point—for example, a Customer Complaints department
 *
 * @package Black\Bundle\CommonBundle\Traits
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
trait ContactPointDocumentTrait
{
    use ThingDocumentTrait;
    use ContactPointTrait;
    
    /**
     * A person or organization can have different contact points, for different
     * purposes. For example, a sales contact point, a PR contact point and so
     * on. This property is used to specify the kind of contact point
     *
     * @ODM\String
     * @Assert\Choice(callback = "getType")
     */
    protected $contactType;

    /**
     * Email address
     *
     * @ODM\String
     * @ODM\UniqueIndex
     * @Assert\Type(type="string")
     * @Assert\Email()
     */
    protected $email;

    /**
     * The fax number
     *
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $faxNumber;

    /**
     * The telephone number
     *
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $telephone;

    /**
     * The mobile number
     *
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $mobile;
}
