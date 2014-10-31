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

use Black\Component\Common\Infrastructure\Doctrine\Manager;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class ValuetoModelsOrNullTransformer
 *
 * ValuetoModelsOrNullTransformer transfom data from collection to an array.
 * It works both with ORM or ODM.
 *
 * @author  Alexandre 'pocky' Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class ValuetoModelsOrNullTransformer implements DataTransformerInterface
{
    /**
     * @var
     */
    protected $manager;

    /**
     * Construct the Transformer
     *
     * @param Manager $manager
     */
    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * {@inheritdoc}
     */
    public function reverseTransform($data)
    {
        if (null === $data) {
            return null;
        }

        if (is_array($data) || is_object($data)) {
            $collection = array();

            foreach ($data as $id) {
                $collection[] = $this->manager->getRepository()->findOneBy(['id' => $id]);
            }

            return $collection;
        }

        $model = $this->manager->getRepository()->findOneBy(['id' => $data]);

        return $model;
    }

    /**
     * {@inheritdoc}
     */
    public function transform($data)
    {
        if (empty($data)) {
            return null;
        }

        if (is_array($data) || is_object($data)) {
            $collection = array();

            if (in_array('getId', get_class_methods($data))) {
                return $data->getId();
            }

            foreach ($data as $model) {
                $collection[] = $model->getId();
            }

            return $collection;
        }

        return $data;
    }
}
