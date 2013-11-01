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

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ImageEntityTrait
 *
 * Add an image to your item
 *
 * @ORM\HasLifecycleCallbacks
 *
 * @package Black\Bundle\CommonBundle\Traits
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
trait ImageEntityTrait
{
    use ImageTrait;

    /**
     * The image to be uploaded
     *
     * @Assert\Image(maxSize="2M")
     * @Assert\File(maxSize="6000000")
     *
     * @access protected
     *
     * {@inheritdoc}
     */
    protected $image;

    /**
     * URL of an image of the item
     *
     * @ORM\Column(name="path", type="string", nullable=true)
     *
     * @access protected
     */
    protected $path;

    /**
     * Generate a random filename for the image uploaded
     *
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     *
     * @access public
     *
     * {@inheritdoc}
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
     * @ORM\PostRemove()
     *
     * @access public
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
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     *
     * @access public
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
