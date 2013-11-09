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
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class PostalAddressType
 *
 * @package Black\Bundle\CommonBundle\Form\Type
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class PostalAddressType extends AbstractType
{
    /**
     * @var string
     */
    protected $class;

    /**
     * @var \Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface
     */
    protected $contact;

    /**
     * @param                     $class
     * @param ChoiceListInterface $contact
     */
    public function __construct($class, ChoiceListInterface $contact)
    {
        $this->class    = $class;
        $this->contact  = $contact;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contactType', 'choice', array(
                    'empty_value'       => 'black.bundle.common.type.postal.type.empty',
                    'label'             => 'black.bundle.common.type.postal.type.label',
                    'choice_list'       => $this->contact
                )
            )
            ->add('name', 'text',  array(
                    'label'         => 'black.bundle.common.type.postal.name.label'
                )
            )
            ->add('description', 'text', array(
                    'label'         => 'black.bundle.common.type.postal.description.label',
                    'required'      => false
                )
            )
            ->add('streetAddress', 'text', array(
                    'label'         => 'black.bundle.common.type.postal.street.label',
                    'required'      => false
                )
            )
            ->add('complementaryStreetAddress', 'text', array(
                    'label'         => 'black.bundle.common.type.postal.complementary.label',
                    'required'      => false
                )
            )
            ->add('postalCode', 'text', array(
                    'label'         => 'black.bundle.common.type.postal.code.label',
                    'required'      => false
                )
            )
            ->add('postOfficeBoxNumber', 'text', array(
                    'label'         => 'black.bundle.common.type.postal.box.label',
                    'required'      => false
                )
            )
            ->add('addressLocality', 'text', array(
                    'label'         => 'black.bundle.common.type.postal.locality.label',
                    'required'      => false
                )
            )
            ->add('addressRegion', 'text', array(
                    'label'         => 'black.bundle.common.type.postal.region.label',
                    'required'      => false
                )
            )
            ->add('addressCountry', 'country', array(
                    'label'         => 'black.bundle.common.type.postal.country.label',
                    'empty_value'   => 'black.bundle.common.type.postal.country.empty',
                    'required'      => false
                )
            )
            ->add('email', 'text', array(
                    'label'         => 'black.bundle.common.type.postal.email.label',
                    'required'      => false
                )
            )
            ->add('faxNumber', 'text', array(
                    'label'         => 'black.bundle.common.type.postal.fax.label',
                    'required'      => false
                )
            )
            ->add('mobile', 'text', array(
                    'label'         => 'black.bundle.common.type.postal.mobile.label',
                    'required'      => false
                )
            )
            ->add('telephone', 'text', array(
                    'label'         => 'black.bundle.common.type.postal.telephone.label',
                    'required'      => false
                )
            )
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'black_common_postaladdress';
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class'            => $this->class,
                'intention'             => 'postal_address_form',
                'translation_domain'    => 'form'
            )
        );
    }
}
