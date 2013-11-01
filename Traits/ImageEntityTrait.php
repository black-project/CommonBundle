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
     * @Assert\Image(maxSize="2M")
     * @Assert\File(maxSize="6000000")
     */
    protected $image;

    /**
     * @ORM\Column(name="path", type="string", nullable=true)
     */
    protected $path;

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->image) {
            $this->path = sha1(uniqid(mt_rand(), true)) . '.' . $this->image->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
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

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($image = $this->getAbsolutePath()) {
            unlink($image);
        }
    }
} 
