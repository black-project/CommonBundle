<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Traits;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Class ImageDocumentTrait
 *
 * Add an image to your item
 *
 * @package Black\Bundle\CommonBundle\Traits
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
trait ImageDocumentTrait
{
    use ImageTrait;

    /**
     * @Assert\Image(maxSize="2M")
     * @Assert\File(maxSize="6000000")
     *
     * @access protected
     *
     * {@inheritdoc}
     */
    protected $image;

    /**
     * @ODM\String
     *
     * @access protected
     *
     * {@inheritdoc}
     */
    protected $path;

    /**
     * Generate a random filename for the image uploaded
     *
     * @access public
     *
     * @ODM\PrePersist()
     * @ODM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->image) {
            $this->path = sha1(uniqid(mt_rand(), true)) . '.' . $this->image->guessExtension();
        }
    }

    /**
     * Unlink the current image on the filesystem
     *
     * @access public
     *
     * @ODM\PostRemove()
     */
    public function removeUpload()
    {
        if ($image = $this->getAbsolutePath()) {
            unlink($image);
        }
    }

    /**
     * Move the image from the temporary dir to the definitive dir
     *
     * @access public
     *
     * @ODM\PostPersist()
     * @ODM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->image) {
            return;
        }

        $this->getImage()->move($this->getUploadRootDir(), $this->path);

        if (isset($this->temp)) {
            unlink($this->getUploadRootDir() . '/' . $this->temp);
            $this->temp = null;
        }

        $this->image = null;
    }
} 
