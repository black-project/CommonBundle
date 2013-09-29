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
 * Class CustomChoiceListType
 *
 * @package Black\Bundle\CommonBundle\Form\Type
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class CustomChoiceListType extends AbstractType
{
    /**
     * @var
     */
    protected $choiceList;

    /**
     * @var
     */
    protected $choiceListName;

    /**
     * @param $choiceList
     * @param $choiceListName
     */
    public function __construct($choiceList, $choiceListName) {
        $this->choiceList       = $choiceList;
        $this->choiceListName   = $choiceListName;
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