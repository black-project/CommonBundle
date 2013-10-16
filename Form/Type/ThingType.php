<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class ThingType
 *
 * @package Black\Bundle\PageBundle\Form\Type
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class ThingType extends AbstractType
{
    /**
     * @var type 
     */
    protected $class;

    /**
     * @param string              $class
     */
    public function __construct($class)
    {
        $this->class    = $class;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                    'label'         => 'black.common.thing.name.label',
                    'required'      => true
                )
            )
            ->add('slug', 'text', array(
                    'label'         => 'black.common.thing.slug.label',
                    'required'      => false
                )
            )
            ->add('description', 'textarea', array(
                    'label'         => 'black.common.thing.description.label',
                    'required'      => false
                )
            )
            ->add('url', 'url', array(
                    'label'         => 'black.common.thing.url.label',
                    'required'      => false

                )
            )
            ->add('sameAs', 'url', array(
                    'label'         => 'black.common.thing.sameAs.label',
                    'required'      => false

                )
            )
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class'            => $this->class,
                'intention'             => 'thing_form',
                'translation_domain'    => 'form'
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'black_common_thing';
    }
}
