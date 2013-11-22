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

use JMS\DiExtraBundle\Annotation\Service;
use Black\Bundle\CommonBundle\Doctrine\ManagerInterface;
use Black\Bundle\CommonBundle\Form\Handler\HandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

/**
 * Class CommonController
 *
 * @package Black\Bundle\CommonBundle\Controller
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class CommonController implements ControllerInterface
{
    /**
     * @var
     */
    protected $exception;
    /**
     * @var
     */
    protected $handler;
    /**
     * @var
     */
    protected $manager;
    /**
     * @var
     */
    protected $request;
    /**
     * @var
     */
    protected $router;
    /**
     * @var
     */
    protected $session;

    /**
     * @param Request          $request
     * @param Router           $router
     * @param SessionInterface $session
     */
    public function __construct(
        Request $request,
        Router $router,
        SessionInterface $session
    )
    {
        $this->request      = $request;
        $this->router       = $router;
        $this->session      = $session;
    }

    /**
     * Create a new object
     *
     * @return mixed
     */
    public function createAction()
    {
        $document   = $this->manager->createInstance();
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
     * Delete an existing object
     *
     * @return mixed
     */
    public function deleteAction($value)
    {
        $document   = $this->manager->findDocument($value);

        if (!$document) {
            throw new $this->exception;
        }

        $this->manager->remove($document);
        $this->manager->flush();

        $this->setFlash('success', 'Object was successfully removed');
    }

    /**
     * @return mixed
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * @return mixed
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return Router
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * Create a list of objects
     *
     * @return mixed
     */
    public function indexAction()
    {
        $documents  = $this->manager->findDocuments();

        return array(
            'documents' => $documents
        );
    }

    /**
     * @param HttpExceptionInterface $exception
     */
    public function setException(HttpExceptionInterface $exception)
    {
        $this->exception    = $exception;
    }

    /**
     * @param HandlerInterface $handler
     */
    public function setHandler(HandlerInterface $handler)
    {
        $this->handler  = $handler;
    }

    /**
     * @param ManagerInterface $manager
     */
    public function setManager(ManagerInterface $manager)
    {
        $this->manager  = $manager;
    }

    /**
     * Show an object
     *
     * @return mixed
     */
    public function showAction($value)
    {
        $document   = $this->manager->findDocument($value);

        if (!$document) {
            throw new $this->exception;
        }

        return array(
            'document'  => $document
        );
    }

    /**
     * Update an existing object
     *
     * @return mixed
     */
    public function updateAction($value)
    {
        $document = $this->manager->findDocument($value);

        if (!$document) {
            throw new $this->exception;
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
     * @param $type
     * @param $message
     *
     * @return mixed
     */
    protected function setFlash($type, $message)
    {
        return $this->session->getFlashBag()->add($type, $message);
    }
}
