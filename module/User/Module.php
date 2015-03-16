<?php
namespace User;

use Zend\Mvc\MvcEvent;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    public function getControllerConfig(){
        return array(
            'abstract_factories'=>array(
                'User\Service\AbstractFactory\AuthAbstractFactory'
            )
        );
    }
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function onBootstrap(MvcEvent $event)
    {
        $application = $event->getApplication();
        $serviceManager = $application->getServiceManager();
        $eventManager = $application->getEventManager();
        $config=$serviceManager->get('config');

         $class=$event->getRouter();
        $eventManager->attach(new \User\Listener\NeedAuthListener);
        $modulemanager = $serviceManager->get('modulemanager');
    }
}
