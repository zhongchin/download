<?php
/**
 * Created by PhpStorm.
 * User: tao.huang
 * Date: 15-1-17
 * Time: 上午9:40
 */

namespace Common\Listener;


use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\Mvc\MvcEvent;

class CheckLangListener implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;

    public function attach(EventManagerInterface $event)
    {
        $this->listeners[] = $event->getSharedManager()->attach('*', MvcEvent::EVENT_ROUTE, array($this, 'checkLang'), -100);
    }

    public function checkLang(EventInterface $event)
    {
        $routeMatch = $event->getRouteMatch();
        $lang = $routeMatch->getParam('lang');
        $serviceManager = $event->getApplication()->getServiceManager();
        $langTable = $serviceManager->get('Common\Model\LangTable');
        $AllLangs = $langTable->getEnableLang()->toArray();
        $langcodes=array();
        foreach($AllLangs as $v){
           $langcodes[]=$v['code'];
        }
        if($lang&&in_array($lang,$langcodes)){
            return ;
        }

        $langObj=$langTable->getDefaultLang()->current();
        $setLang=$defaultLang=$langObj->code;
       if(!$defaultLang){
           $header=$event->getRequest()->getHeaders();
           if($header->has('Accept-language')){
               $acceptLang=$header->get('accept-language')->toString();
               $setLang=substr($acceptLang,strpos($acceptLang,',')+2,2);
           }else{
               $setLang='en';
           }

       }
        $routeMatch->setParam('lang',$setLang);
        return ;
    }
} 