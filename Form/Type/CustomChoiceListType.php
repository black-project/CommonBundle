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
class CustomChoiceListType extends AbstractType
{
    protected $choiceList;
    protected $choiceListName;

    /**
     * Constructor
     * 
     * @param type $choiceList
     */
    public function __construct($choiceList, $choiceListname) {
        $this->choiceList       = $choiceList;
        $this->choiceListName   = $choiceListname;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'choice_list' => $this->choiceList,
        ));
    }
 
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'choice';
    }
 
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->choiceListName;
    }
}