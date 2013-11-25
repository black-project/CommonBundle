<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Form\Handler;

/**
 * Class HandlerInterface
 *
 * @package Black\Bundle\CommonBundle\Form\Handler
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
interface HandlerInterface
{
    /**
     * @param $object
     *
     * @return mixed
     */
    public function process($object);

    /**
     * @return mixed
     */
    public function getForm();

    /**
     * @return mixed
     */
    public function getUrl();
}
