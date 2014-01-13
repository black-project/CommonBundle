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
use Symfony\Component\Form\Extension\Csrf\CsrfProvider\CsrfProviderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Intl\Exception\MethodNotImplementedException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class CommonController
 *
 * @package Black\Bundle\CommonBundle\Controller
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
abstract class AdminCommonController implements ControllerInterface
{
    /**
     * @var \Black\Bundle\CommonBundle\Configuration\Configuration
     */
    protected $configuration;

    /**
     * @var \Symfony\Component\Form\Extension\Csrf\CsrfProvider\CsrfProviderInterface
     */
    protected $csrf;

    /**
     * @var \Black\Bundle\CommonBundle\Form\Handler\HandlerInterface
     */
    protected $handler;

    /**
     * @param Configuration         $configuration
     * @param CsrfProviderInterface $csrf
     * @param HandlerInterface      $handler
     */
    public function __construct
    (
        Configuration $configuration,
        CsrfProviderInterface $csrf,
        HandlerInterface $handler
    )
    {
        $this->configuration    = $configuration;
        $this->csrf             = $csrf;
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
     * @return mixed
     */
    public function readAction($value)
    {
        $document   = $this->configuration->getManager()->findDocument($value);

        if (!$document) {
            throw new $this->configuration->getException();
        }

        return array(
            'document'  => $document
        );
    }

    /**
     * Edit an object
     *
     * @param $value
     *
     * @return array|RedirectResponse
     */
    public function editAction($value)
    {
        $document = $this->configuration->getManager()->findDocument($value);

        if (!$document) {
            throw new $this->configuration->getException();
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
     * @return bool|mixed
     * @throws \Symfony\Component\HttpKernel\Exception\HttpExceptionInterface
     */
    public function deleteAction($value)
    {
        $documentManager = $this->configuration->getManager();
        $document = $documentManager->findDocument($value);

        if (!$document) {
            throw $this->configuration->getException();
        }
        $documentManager->remove($document);
        $documentManager->flush();

        return true;
    }

    /**
     * Delete a object through the delete button in table
     *
     * @param $value
     * @param null $token
     * @param array $params
     * @return RedirectResponse
     */
    public function deleteButtonAction($value, $token = null,array $params)
    {
        if (null !== $token) {
            $token = $this->csrf->isCsrfTokenValid($params['csrf'], $token);

            if (true === $token) {

                if ($deleteAction = self::deleteAction($value)) {

                    $this->configuration->setFlash('success', $params['trans']['success'][0]);

                    return new RedirectResponse($this->generateUrl($params['generateUrl']));
                }
            }
        }
        $this->configuration->setFlash('error', $params['trans']['error'][0]);
        return new RedirectResponse($this->generateUrl($params['generateUrl']));
    }

    /**
     * @param $params
     * @return RedirectResponse
     * @throws \Symfony\Component\Intl\Exception\MethodNotImplementedException
     */
    public function batchAction($params)
    {
        $request = $this->configuration->getRequest();
        $token = $this->csrf->isCsrfTokenValid($params['csrf'], $request->get('token'));

        if (false === $token) {
            $this->configuration->setFlash('error', $params['trans']['error'][0]);

            return new RedirectResponse($this->generateUrl($params['generateUrl']));
        }

        if (!$action = $request->get('batchAction')) {
            $this->configuration->setFlash('error', $params['trans']['error'][1]);

            return new RedirectResponse($this->generateUrl($params['generateUrl']));
        }

        if (!$ids = $request->get('ids')) {
            $this->configuration->setFlash('error', $params['trans']['error'][2]);

            return new RedirectResponse($this->generateUrl($params['generateUrl']));
        }

        if (!method_exists($this, $method = $action . 'Action')) {
            throw new MethodNotImplementedException($method);
        }

        foreach ($ids as $id) {
            $this->$method($id);
        }

        if (sizeof($ids)>1) {
            $this->configuration->setFlash('success', $params['trans']['success'][1]);
        } else {
            $this->configuration->setFlash('success', $params['trans']['success'][0]);
        }

        return new RedirectResponse($this->generateUrl('admin_page_index'));
    }

    /**
     * @param $url
     * @param array $parameters
     * @param $referenceType
     * @return string
     */
    protected function generateUrl($url, $parameters = array(), $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        return $this->configuration->getRouter()->generate($url, $parameters, $referenceType);
    }

    /**
     * @return mixed
     */
    protected function getManager()
    {
        return $this->configuration->getManager();
    }
}


