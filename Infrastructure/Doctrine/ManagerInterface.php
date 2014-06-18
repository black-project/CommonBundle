<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <alexandre@lablackroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Infrastructure\Doctrine;

/**
 * Interface InfrastructureInterface
 *
 * @package Black\Bundle\CommonBundle\Application\Doctrine
 */
interface ManagerInterface
{
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
