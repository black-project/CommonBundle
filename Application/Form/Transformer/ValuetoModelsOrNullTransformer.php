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

use Black\Bundle\CommonBundle\Infrastructure\Doctrine\ManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class ValuetoModelsOrNullTransformer
 *
 * ValuetoModelsOrNullTransformer transfom/reverse data from collection to an array.
 * It works both with ORM or ODM.
 *
 * @author  Alexandre 'pocky' Balmes <albalmes@gmail.com>
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
     * @param ManagerInterface $manager
     */
    public function __construct(ManagerInterface $manager)
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
