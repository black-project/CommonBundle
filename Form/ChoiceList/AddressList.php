<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Form\ChoiceList;

use Symfony\Component\Form\Extension\Core\ChoiceList\LazyChoiceList;
use Symfony\Component\Form\Extension\Core\ChoiceList\SimpleChoiceList;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AddressList
 *
 * @package Black\Bundle\CommonBundle\Form\ChoiceList
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class AddressList extends LazyChoiceList
{
    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    protected $request;

    /**
     * @param Request       $request
     */
    public function __construct(Request $request)
    {
        $this->request  = $request;
    }

    /**
     * @return $this
     */
    protected function getClass()
    {
        return $this;
    }

    /**
     * @return SimpleChoiceList|\Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface
     */
    protected function loadChoiceList()
    {
        $array = array(
           'principal'  => 'black.bundle.common.choice.address.principal',
           'home'       => 'black.bundle.common.choice.address.home',
           'work'       => 'black.bundle.common.choice.address.work',
           'other'      => 'black.bundle.common.choice.address.other'
        );

        $choices = new SimpleChoiceList($array);

        return $choices;
    }
}
