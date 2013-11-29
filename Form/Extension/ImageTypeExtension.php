<?php

/*
 * This file is part of the Black package.
 *
 * (c) Boris Tacyniak <boris.tacyniak@free.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * Class ImageTypeExtension
 *
 * @package Black\Bundle\CommonBundle\Form\Extension
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class ImageTypeExtension extends AbstractTypeExtension
{
    /**
     * @param FormView      $view
     * @param FormInterface $form
     * @param array         $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if (array_key_exists('image_path', $options)) {

            $parentData = $form->getParent()->getData();

            if (null !== $parentData) {
                $accessor   = PropertyAccess::createPropertyAccessor();
                $imageUrl   = $accessor->getValue($parentData, $options['image_path']);
            } else {
                $imageUrl = null;
            }

            $view->vars['image_url'] = $imageUrl;
        }
    }

    /**
     * @return string
     */
    public function getExtendedType()
    {
        return 'file';
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array('image_path'));
    }
}
