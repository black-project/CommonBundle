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

use Black\Bundle\CommonBundle\Doctrine\ManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * ValuetoModelsOrNullTransformer transfom/reverse data from collection to an array.
 * It work both with ORM or ODM.
 *
 * @package Black\Bundle\CommonBundle\Form\Transformer
 * @author  Boris Tacyniak <boris.tacyniak@viacesi.fr>
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
