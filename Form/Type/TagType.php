<?php

/*
 * This file is part of the Black package.
 *
 * (c) Boris Tacyniak <boris.tacyniak@free.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Form\Type;

use Black\Bundle\CommonBundle\Form\Transformer\TextToTagTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * TagType create a new type for TextToTagTransformer
 *
 * @package Black\Bundle\CommonBundle\Form\Type
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class TagType extends AbstractType
{
    /**
     * @var
     */
    protected $name;

    /**
     * Construct the type with his name
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new TextToTagTransformer();
        $builder->addModelTransformer($transformer);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getParent()
    {
        return 'text';
    }
}
