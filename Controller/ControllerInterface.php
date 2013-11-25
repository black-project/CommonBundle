<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Controller;

/**
 * Class ControllerInterface
 *
 * @package Black\Bundle\CommonBundle\Controller
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
interface ControllerInterface
{
    /**
     * Create a new object
     *
     * @return mixed
     */
    public function createAction();

    /**
     * Delete an existing object
     *
     * @return mixed
     */
    public function deleteAction($value);

    /**
     * Create a list of objects
     *
     * @return mixed
     */
    public function indexAction();

    /**
     * Show an object
     *
     * @return mixed
     */
    public function showAction($value);

    /**
     * Update an existing object
     *
     * @return mixed
     */
    public function updateAction($value);
}
