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

use Doctrine\Common\Persistence\ObjectManager;

abstract class AbstractManager implements ManagerInterface
{
    /**
     * @var ObjectManager
     */
    protected $manager;

    /**
     * @var ObjectRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $class;

    /**
     * @param ObjectManager $om
     * @param $class
     */
    public function __construct(ObjectManager $om, $class)
    {
        $this->manager    = $om;
        $this->repository = $om->getRepository($class);
        $metadata         = $om->getClassMetadata($class);
        $this->class      = $metadata->name;
    }

    /**
     * @return ObjectManager
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @return ObjectRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * Flush
     */
    public function flush()
    {
        $this->manager->flush();
    }

    /**
     * @return mixed
     */
    public function createInstance()
    {
        $class  = $this->getClass();
        $object = new $class;

        return $object;
    }

    /**
     * @return string
     */
    protected function getClass()
    {
        return $this->class;
    }
} 