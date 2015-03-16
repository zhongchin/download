<?php
namespace Admin;

use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\Mvc\MvcEvent;

class Module //implements BootstrapListenerInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
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

    public function onBootstrap(MvcEvent $e)
    {
        $application = $e->getApplication();
        $eventManager = $application->getEventManager();
        $serviceManager = $application->getServiceManager();
        $controller=$e->getTarget();
        //$render=$serviceManager->get("phpRenderer");
            $a=$e->getRouteMatch();
        $eventManager->attach('dispatch',function($e)use ($serviceManager){
                  $matches=$e->getRouteMatch();
               $controller=$matches->getParam("controller");
              if(false===strpos($controller,__NAMESPACE__)){
                  return ;
              }
            $viewModel=$e->getViewModel();
            $tplDir=TPL_PATH.DIRECTORY_SEPARATOR.'default'.DIRECTORY_SEPARATOR;
            $configReader=new \Zend\Config\Reader\Xml();
            $templateConfig=$configReader->fromFile($tplDir.'template.xml');

            $viewModel->setTemplate("admin/layout");


        });


    }
}
