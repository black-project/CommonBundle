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
use Symfony\Component\Form\FormBuilderInterface;
use Black\Bundle\CommonBundle\Form\Transformer\ValuetoModelsOrNullTransformer;

/**
 * EnabledType
 */
class CustomChoiceListType extends AbstractType
{
    /**
     * @var type 
     */
    protected $choiceList;

    /**
     * @var type 
     */
    protected $choiceListName;

    /**
     * @var type
     */
    protected $manager;

    /**
     * @param $manager
     */
    public function setManager($manager)
    {
        $this->manager = $manager;
    }

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
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if($this->manager !== null) {
            $builder->addModelTransformer(
                new ValuetoModelsOrNullTransformer($this->manager)
             );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'choice_list' => $this->choiceList,
            )
        );
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