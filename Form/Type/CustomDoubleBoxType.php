<?php

/*
 * This file is part of the Blackengine package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\CommonBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * EnabledType
 */
class CustomDoubleBoxType extends CustomChoiceListType
{
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'double_box';
    }
}