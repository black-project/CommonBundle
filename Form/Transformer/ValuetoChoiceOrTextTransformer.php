<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Form\Transformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface;

/**
 * Class ValuetoChoiceOrTextTransformer
 *
 * @package Black\Bundle\CommonBundle\Form\Transformer
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class ValuetoChoiceOrTextTransformer implements DataTransformerInterface
{
    /**
     * @var
     */
    protected $choices;

    /**
     * @param $choices
     */
    public function __construct(ChoiceListInterface $choices)
    {
        $this->choices = $choices->getChoices();
    }

    /**
     * @param mixed $data
     *
     * @return mixed
     */
    public function reverseTransform($data)
    {
        if ('other' === $data['choice']) {
            return $data['text'];
        }

        return $data['choice'];
    }

    /**
     * @param mixed $data
     *
     * @return array|mixed
     */
    public function transform($data)
    {
        if (in_array($data, $this->choices, true)) {
            return array(
                'choice'    => $data,
                'text'      => null
            );
        }

        return array(
            'choice'    => 'other',
            'text'      => $data
        );
    }
}
