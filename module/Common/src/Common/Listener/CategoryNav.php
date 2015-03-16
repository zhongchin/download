<?php
/**
 * Created by PhpStorm.
 * User: tao.huang
 * Date: 15-1-15
 * Time: 下午5:21
 */

namespace Common\Listener;


use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\Mvc\MvcEvent;

class CategoryNav implements  ListenerAggregateInterface
{
    use ListenerAggregateTrait;

    public function attach(EventManagerInterface $event){
        $this->listeners[]=$event->getSharedManager()->attach('*',MvcEvent::EVENT_DISPATCH,array($this,'categorynav'));

    }
   public function categorynav(EventInterface $event){

   }
} 