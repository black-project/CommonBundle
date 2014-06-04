<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Application\Doctrine;

/**
 * Interface ManagerInterface
 *
 * @package Black\Bundle\CommonBundle\Application\Doctrine
 */
interface ManagerInterface
{
    /**
     * Create an object
     *
     * @return mixed
     */
    public function createInstance();

    /**
     * Return the object manager
     *
     * @return mixed
     */
    public function getManager();

    /**
     * Return the object repository
     *
     * @return mixed
     */
    public function getRepository();

    /**
     * Flush the curent manager
     *
     * @return mixed
     */
    public function flush();
} 
