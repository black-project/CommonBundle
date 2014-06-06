<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <alexandre@lablackroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Application\Form\Transformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface;

/**
 * Class ValuetoChoiceOrTextTransformer
 *
 * ValueToChoiceOrTextTransformer save the content of TextType value if "other" is selected.
 * Otherwise, this transformer save the value of the ChoiceType
 *
 * @author  Alexandre 'pocky' Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class ValuetoChoiceOrTextTransformer implements DataTransformerInterface
{
    /**
     * @var array
     */
    protected $choices;

    /**
     * Construct the transformer
     *
     * @param ChoiceListInterface $choices
     */
    public function __construct(ChoiceListInterface $choices)
    {
        $this->choices = $choices->getChoices();
    }

    /**
     * {@inheritDoc}
     */
    public function reverseTransform($data)
    {
        if ('other' === $data['choice']) {
            return $data['text'];
        }

        return $data['choice'];
    }

    /**
     * {@inheritDoc}
     */
    public function transform($data)
    {
        if (in_array($data, $this->choices, true)) {
            return ['choice' => $data, 'text' => null];
        }

        return ['choice' => 'other', 'text' => $data];
    }
}
