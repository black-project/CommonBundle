<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Configuration;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Black\Bundle\CommonBundle\Doctrine\ManagerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class Configuration
 *
 * @package Black\Bundle\CommonBundle\Configuration
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class Configuration
{
    /**
     * @var
     */
    protected $exception;
    /**
     * @var
     */
    protected $manager;
    /**
     * @var
     */
    protected $router;
    /**
     * @var
     */
    protected $session;
    /**
     * @var Request
     */
    protected $request;
    /**
     * @var array
     */
    protected $parameters;

    /**
     * @param Request                $request
     * @param Router                 $router
     * @param SessionInterface       $session
     * @param HttpExceptionInterface $exception
     * @param ManagerInterface       $manager
     * @param array                  $parameters
     */
    public function __construct(
        Request $request,
        Router $router,
        SessionInterface $session,
        HttpExceptionInterface $exception,
        ManagerInterface $manager,
        array $parameters = array()
    )
    {
        $this->request      = $request;
        $this->router       = $router;
        $this->session      = $session;
        $this->exception    = $exception;
        $this->manager      = $manager;
        $this->parameters   = $parameters;
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
     * @return SessionInterface
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @return HttpExceptionInterface
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * @return ManagerInterface
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param $parameter
     *
     * @return mixed
     */
    public function getParameter($parameter)
    {
        return $this->parameters[$parameter];
    }

    /**
     * @param $parameter
     *
     * @return bool
     */
    public function hasParameter($parameter)
    {
        if (in_array($parameter, $this->parameters)) {
            return true;
        }

        return false;
    }

    /**
     * @param $type
     * @param $message
     *
     * @return mixed
     */
    public function setFlash($type, $message)
    {
        return $this->session->getFlashBag()->add($type, $message);
    }

    /**
     * @param       $route
     * @param array $parameters
     * @param       $referenceType
     *
     * @return mixed
     */
    public function generateUrl($route, $parameters = array(), $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        return $this->router->generate($route, $parameters, $referenceType);
    }
} 
