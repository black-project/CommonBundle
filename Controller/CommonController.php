<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Controller;

use Black\Bundle\CommonBundle\Configuration\Configuration;
use Black\Bundle\CommonBundle\Form\Handler\HandlerInterface;
use Symfony\Component\Finder\Exception\OperationNotPermitedException;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class CommonController
 *
 * @package Black\Bundle\CommonBundle\Controller
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @author  Sébastien Grans <sebastien@activcompany.fr>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
abstract class CommonController implements ControllerInterface
{
    /**
     * @var \Black\Bundle\CommonBundle\Configuration\Configuration
     */
    protected $configuration;
    /**
     * @var \Black\Bundle\CommonBundle\Form\Handler\HandlerInterface
     */
    protected $handler;

    /**
     * @param Configuration    $configuration
     * @param HandlerInterface $handler
     */
    public function __construct(Configuration $configuration, HandlerInterface $handler)
    {
        $this->configuration    = $configuration;
        $this->handler          = $handler;
    }

    /**
     * Create a new object
     *
     * @return mixed
     */
    public function createAction()
    {
        $document   = $this->configuration->getManager()->createInstance();
        $process    = $this->handler->process($document);

        if ($process) {
            return new RedirectResponse($this->handler->getUrl());
        }

        return array(
            'document'  => $document,
            'form'      => $this->handler->getForm()->createView()
        );
    }

    /**
     * Create a list of objects
     *
     * @return mixed
     */
    public function indexAction()
    {
        $documents  = $this->configuration->getManager()->findDocuments();

        return array(
            'documents' => $documents
        );
    }

    /**
     * Show an object
     *
     * @param $value
     *
     * @return array|mixed
     * @throws \Symfony\Component\HttpKernel\Exception\HttpExceptionInterface
     */
    public function readAction($value)
    {
        $document   = $this->configuration->getManager()->findDocument($value);

        if (!$document) {
            throw $this->configuration->getException();
        }

        return array(
            'document' => $document
        );
    }

    /**
     * Update an existing object
     *
     * @param $value
     *
     * @return array|mixed|RedirectResponse
     * @throws \Symfony\Component\HttpKernel\Exception\HttpExceptionInterface
     */
    public function updateAction($value)
    {
        $document = $this->configuration->getManager()->findDocument($value);

        if (!$document) {
            throw $this->configuration->getException();
        }

        $process = $this->handler->process($document);

        if ($process) {
            return new RedirectResponse($this->handler->getUrl());
        }

        return array(
            'document'  => $document,
            'form'      => $this->handler->getForm()->createView()
        );
    }

    /**
     * Delete an existing object
     *
     * @param $value
     *
     * @return mixed|RedirectResponse
     */
    public function deleteAction($value)
    {
        $document   = $this->configuration->getManager()->findDocument($value);

        if (!$document) {
            throw new $this->configuration->getException();
        }

        $this->configuration->getManager()->remove($document);
        $this->configuration->getManager()->flush();


        $this->configuration->setFlash('success', 'Object was successfull removed');

        return new RedirectResponse
        (
            $this->configuration->getRouter()->generate($this->configuration->getParameter('route')['index'])
        );

    }
}
