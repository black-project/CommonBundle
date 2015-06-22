<?php
/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <alexandre@lablackroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Application\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RequestStack;

abstract class AbstractFormHandler implements HandlerInterface
{
    /**
     * @var \Symfony\Component\Form\FormInterface
     */
    protected $form;

    /**
     * @var null|\Symfony\Component\HttpFoundation\Request
     */
    protected $request;

    /**
     * @param FormInterface $form
     * @param RequestStack  $requestStack
     */
    public function __construct(
        FormInterface $form,
        RequestStack $requestStack
    ) {
        $this->form    = $form;
        $this->request = $requestStack->getCurrentRequest();
    }

    /**
     * @return bool|mixed
     */
    public function process()
    {
        if ('POST' === $this->request->getMethod()) {

            $this->form->handleRequest($this->request);

            if ($this->form->isValid()) {
                return $this->form->getData();
            }

            return $this->stop();
        }
    }

    /**
     * @return bool
     */
    public function stop()
    {
        return false;
    }
}
