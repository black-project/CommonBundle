<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre 'pocky' Balmes <alexandre@lablackroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Tests\Application\Form\Transformer;

use Black\Bundle\CommonBundle\Application\Form\Transformer\TextToTagTransformer;

/**
 * Class TextToTagTransformerTest
 *
 * @author  Alexandre 'pocky' Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class TextToTagTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testReverseTransform()
    {
        $tags = "test,test2";

        $transformer = new TextToTagTransformer();
        $array = $transformer->reverseTransform($tags);

        $this->assertEquals('test', $array[0]);
        $this->assertEquals('test2', $array[1]);
    }

    public function testTransform()
    {
        $tags = ['test', 'test1'];

        $transformer = new TextToTagTransformer();
        $string = $transformer->transform($tags);

        $this->assertEquals('test,test1', $string);
    }
}
