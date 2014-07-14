<?php
/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <alexandre@lablackroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Infrastructure\CQRS;

use Black\DDD\DDDinPHP\Infrastructure\CQRS\CommandBusInterface;
use Black\DDD\DDDinPHP\Infrastructure\CQRS\CommandHandlerInterface;
use Black\DDD\DDDinPHP\Infrastructure\CQRS\CommandInterface;

/**
 * Class Bus
 *
 * @author  Alexandre 'pocky' Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
final class CommandBus implements CommandBusInterface
{
    /**
     * @var array
     */
    protected $handlers = array();

    /**
     * @param $commandClassName
     * @param CommandHandlerInterface $handler
     */
    public function register($commandClassName, CommandHandlerInterface $handler)
    {
        $this->handlers[$commandClassName] = $handler;
    }

    /**
     * @param $command
     */
    public function handle($command)
    {
        $this->handlers[get_class($command)]->handle($command);
    }

    /**
     * @return array
     */
    public function getHandlers()
    {
        return $this->handlers;
    }
} 