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
class ValuetoModelsOrNullTransformer implements DataTransformerInterface
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
            $collection = array();
            foreach($data as $model) {
                $collection[] = $model->getId();
            }
            return $collection;
        }
    }

    /**
     * @param mixed $data
     *
     * @return mixed
     */
    public function reverseTransform($data)
    {
        $collection = array();
        foreach($data as $id) {
            $collection[] = $this->manager->getRepository()->findOneBy(array('id' => $id));
        }

        return $collection;
    }
}
