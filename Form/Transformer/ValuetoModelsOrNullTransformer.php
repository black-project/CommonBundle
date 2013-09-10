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
    protected $manager;

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
        } else if(is_array($data) || is_object($data)) {
            $collection = array();
            if(in_array('getId', get_class_methods($data))) {
                return $data->getId();
            }
            foreach($data as $model) {
                $collection[] = $model->getId();
            }
            return $collection;
        } else {
            return $data;
        }
    }

    /**
     * @param mixed $data
     *
     * @return mixed
     */
    public function reverseTransform($data)
    {
        if (null === $data) {
            return null;
        } else if(is_array($data) || is_object($data)) {
            $collection = array();
            foreach($data as $id) {
                $collection[] = $this->manager->getRepository()->findOneBy(array('id' => $id));
            }
            return $collection;
        } else {
            $model = $this->manager->getRepository()->findOneBy(array('id' => $data));
            return  $model;
        }
    }
}
