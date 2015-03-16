<?php
/**
 * Created by PhpStorm.
 * User: tao.huang
 * Date: 15-1-15
 * Time: 上午11:57
 */

namespace User\Service\Factories;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator){
         $config=$serviceLocator->get('config');
        var_dump($config);

    }
} 