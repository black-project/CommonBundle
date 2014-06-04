<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Application\Form\Transformer;

use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class TextToTagTransformer
 *
 * Text to tag transformer transform/reverse an array to comma-separated keywords
 *
 * @author  Alexandre 'pocky' Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class TextToTagTransformer implements DataTransformerInterface
{
    /**
     * {@inheritdoc}
     */
    public function reverseTransform($keywords)
    {
        if (!$keywords) {
            return array();
        }

        $keywords = explode(',', $keywords);

        return $keywords;
    }

    /**
     * {@inheritdoc}
     */
    public function transform($keywords)
    {
        if (null === $keywords) {
            return false;
        }

        $keywords = implode(',', $keywords);

        return $keywords;
    }
}
