<?php
namespace Common;

use Common\View\Helper\CheckLang;
use Zend\Form\View\HelperConfig;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\SimpleRouteStack;
use Zend\View\HelperPluginManager;

class Module
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

    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'checklang' => function ($pluginManager) {
                        $helper = new CheckLang($pluginManager);
                        return $helper;
                    },
            )
        );
    }

    public function onBootstrap(MvcEvent $event)
    {
        $application = $event->getApplication();
        $eventManager = $application->getEventManager();
        $serviceManager = $application->getServiceManager();
        $serviceManager->get('viewhelpermanager')->setFactory('categorynav', function ($pluginManager) use($event){
            return new \Common\View\Helper\Category($pluginManager,$event);
        });
        $eventManager->attach(new \Common\Listener\CheckLangListener());
        $renderer=$serviceManager->get('Zend\View\Renderer\PhpRenderer');
        $resolver=$serviceManager->get('Zend\View\Resolver\AggregateResolver');
        $templateMapResover=$serviceManager->get('Zend\View\Resolver\TemplateMapResolver');
        $templatePathStack=$serviceManager->get('Zend\View\Resolver\TemplatePathStack');

         $tplDir=TPL_PATH.DIRECTORY_SEPARATOR.'default'.DIRECTORY_SEPARATOR;
         $configReader=new \Zend\Config\Reader\Xml();
         $templateConfig=$configReader->fromFile($tplDir.'template.xml');

         $maps=array();
        foreach($templateConfig['templatemap']['map'] as $mapconfig){
              $maps=array_merge($maps,array($mapconfig['name']=>$tplDir.$mapconfig['path']));
        }

        $templateMapResover->setMap($maps);
        $templatePathStack->setPaths(array($tplDir));
        $renderer->setResolver($resolver);

        $this->initializeView($event);
       $this->setupView($event);
    }
     public function initializeView(MvcEvent $e){
         $app=$e->getApplication();
         $request=$app->getRequest();

         if(method_exists($request,'getBasePath')){
             $basePath=$request->getBasePath();
         }
         $serviceManager=$app->getServiceManager();

         $view=$serviceManager->get('Zend\View\View');
         $strategy=$serviceManager->get('Common\View\Strategy\SmartyStrategy');
         $renderer=$strategy->getRenderer();

         $resolver=$serviceManager->get('viewresolver');
         $renderer->setResolver($resolver);

         $smarty=$renderer->getEngine();
         $config=$serviceManager->get('config');
        foreach($config['smarty'] as $key=>$value){
          if(isset($smarty->$key)){
              $smarty->$key=$value;
          }
        }
         $helpers=$serviceManager->get('Zend\View\Renderer\PhpRenderer')->getHelperPluginManager();
         $renderer->setHelperPluginManager($helpers);
         $routes=$serviceManager->get('router');
       //  $renderer->plugin('url')->setRouter(SimpleRouteStack::factory($config['router']['routes']));
         $renderer->plugin('url')->setRouter($routes);

         if (isset($basePath)) {
             $renderer->plugin('basePath')->setBasePath($basePath);
         }

     }

    public function setupView(MvcEvent $e){
        $application=$e->getApplication();
        $serviceManager=$application->getServiceManager();
        $view=$serviceManager->get('Zend\View\View');
        $smartyRenderingStrategy=$serviceManager->get('Common\View\Strategy\SmartyStrategy');
        $view->addRenderingStrategy(array($smartyRenderingStrategy,'selectRenderer'));
        $view->addResponseStrategy(array($smartyRenderingStrategy,'injectResponse'));
    }
}
