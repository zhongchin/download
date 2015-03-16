<?php
/**
 * Created by PhpStorm.
 * User: tao.huang
 * Date: 15-1-15
 * Time: 下午1:10
 */

namespace User\Service\AbstractFactory;


use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthAbstractFactory  implements AbstractFactoryInterface
{
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator,$name,$requestedName){

    }
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName){
        var_dump($requestedName);

    }
} 