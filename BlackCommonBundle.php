<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <alexandre@lablackroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle;

use Black\Bundle\CommonBundle\Application\DependencyInjection\BlackCommonExtension;
use Symfony\Component\Console\Application;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class BlackCommonBundle
 *
 * @author  Alexandre 'pocky' Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class BlackCommonBundle extends Bundle
{
    /**
     * @return BlackCommonExtension|null|\Symfony\Component\DependencyInjection\Extension\ExtensionInterface
     */
    public function getContainerExtension()
    {
        return new BlackCommonExtension();
    }

    /**
     * {@inheritdoc}
     */
    public function registerCommands(Application $application)
    {
        return;
    }
}
