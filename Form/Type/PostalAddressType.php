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
        //$subscriber = new SetPostalAddressDataSubscriber($builder->getFormFactory(), $this->class);
        //$builder->addEventSubscriber($subscriber);

        $builder
            ->add('contactType', 'choice', array(
                    'empty_value'       => 'person.admin.postalAddress.type.empty',
                    'label'             => 'person.admin.postalAddress.type.text',
                    'choice_list'       => $this->contact
                )
            )
            ->add('name', 'text',  array(
                    'label'         => 'person.admin.postalAddress.name.text'
                )
            )
            ->add('description', 'text', array(
                    'label'         => 'person.admin.postalAddress.description.text',
                    'required'      => false
                )
            )
            ->add('streetAddress', 'text', array(
                    'label'         => 'person.admin.postalAddress.address.street.text',
                    'required'      => false
                )
            )
            ->add('complementaryStreetAddress', 'text', array(
                    'label'         => 'person.admin.postalAddress.address.complementary.text',
                    'required'      => false
                )
            )
            ->add('postalCode', 'text', array(
                    'label'         => 'person.admin.postalAddress.address.postal.text',
                    'required'      => false
                )
            )
            ->add('postOfficeBoxNumber', 'text', array(
                    'label'         => 'person.admin.postalAddress.address.box.text',
                    'required'      => false
                )
            )
            ->add('addressLocality', 'text', array(
                    'label'         => 'person.admin.postalAddress.address.locality.text',
                    'required'      => false
                )
            )
            ->add('addressRegion', 'text', array(
                    'label'         => 'person.admin.postalAddress.address.region.text',
                    'required'      => false
                )
            )
            ->add('addressCountry', 'country', array(
                    'label'         => 'person.admin.postalAddress.address.country.text',
                    'empty_value'   => 'person.admin.postalAddress.address.country.empty',
                    'required'      => false
                )
            );
    }

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

    public function getName()
    {
        return 'black_common_postaladdress';
    }
}
