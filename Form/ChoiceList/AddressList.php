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
     * @return SimpleChoiceList|\Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface
     */
    protected function loadChoiceList()
    {
        $array = array(
           'P' => 'person.admin.postalAddress.type.choice.principal',
           'H' => 'person.admin.postalAddress.type.choice.home',
           'W' => 'person.admin.postalAddress.type.choice.work',
           'O' => 'person.admin.postalAddress.type.choice.other'
        );
        $choices = new SimpleChoiceList($array);

        return $choices;
    }

    /**
     * @return $this
     */
    protected function getClass()
    {
        return $this;
    }
}
