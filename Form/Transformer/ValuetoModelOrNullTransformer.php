<?php
/*
 * This file is part of the Blackengine package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Form\Transformer;

use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class ValuetoChoiceOrTextTransformer
 *
 * @package Black\Bundle\MenuBundle\Form\Transformer
 */
class ValuetoModelOrNullTransformer implements DataTransformerInterface
{
    /**
     * @var
     */
    private $manager;

    /**
     * @param ObjectManager $manager
     */
    public function __construct($manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param mixed $data
     *
     * @return array|mixed
     */
    public function transform($data)
    {
        if(empty($data)) {
            return null;
        } else {
            return  array('choice' => $data->getId(), 'text' => $data->getName());
        }
    }

    /**
     * @param mixed $data
     *
     * @return mixed
     */
    public function reverseTransform($data)
    {
        if ('other' === $data['choice']) {
            return null;
        }

        return $this->manager->findOneBy(array('id' => $data['choice']));
    }
}
