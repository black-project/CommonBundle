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
 * Class ValuetoModelOrNullTransformer
 *
 * @package Black\Bundle\CommonBundle\Form\Transformer
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
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
        if (empty($data)) {
            return null;
        } else {
            return $data->getId();
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
        }

        return $this->manager->getRepository()->findOneBy(array('id' => $data));
    }
}
