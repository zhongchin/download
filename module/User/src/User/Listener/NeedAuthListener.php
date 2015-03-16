<?php
/**
 * Created by PhpStorm.
 * User: tao.huang
 * Date: 15-1-15
 * Time: 下午12:12
 */

namespace User\Listener;


use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\ServiceManager\ServiceLocatorInterface;

class NeedAuthListener implements ListenerAggregateInterface, ServiceLocatorAwareInterface
{
    use ListenerAggregateTrait;
    use ServiceLocatorAwareTrait;

    public function attach(EventManagerInterface $event)
    {
        $this->listeners[] = $event->attach(MvcEvent::EVENT_ROUTE, array($this, 'checkAuth'), -100);
    }

    public function checkAuth(EventInterface $event)
    {
        $application = $event->getApplication();
        $serviceManager = $application->getServiceManager();
        $config = $serviceManager->get("config");

        $match = $event->getRouteMatch();
        $params=$match->getParams();
        $controller=$params['controller'];
        $controllerPath=explode('\\',$controller);
          if(in_array($controllerPath[0],$config['protected_module'])){//在受保护的模块中就验证

          }
    }


}
