<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'di'=>array(
        'services'=>array(
           'Front\Model\CategoryTable'=>'Front\Model\CategoryTable'
        )
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/[:lang]',
                    'constraints'=>array(
                        'lang'=>'[a-zA-Z]{2}'
                    ),
                    'defaults' => array(
                        'controller' => 'Front\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'application' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/home[/:lang]',
                    'constraints'=>array(
                        'lang'=>'[a-zA-Z]{2}',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Front\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                        'lang'=>''
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'search'=>array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '[/:lang]/search[/:id].html',
                    'constraints'=>array(
                        'lang'=>'[a-zA-Z]{2}',
                        'id'=>'\w*',
                    ),
                    'defaults' => array(
                        'controller' => 'Front\Controller\Index',
                        'action'     => 'search',
                        'lang'=>'',
                        'id'=>''
                    ),
                ),
            ),
            'category' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '[/:lang]/category[-:id[-:page]].html',
                    'constraints'=>array(
                        'lang'=>'[a-zA-Z]{2}',
                        'id'=>'\w*',
                        'page'=>'[0-9]*'
                    ),
                    'defaults' => array(
                        'controller' => 'Front\Controller\Category',
                        'action'     => 'index',
                        'lang'=>'',
                        'id'=>'',
                        'page'=>1
                    ),
                ),
            ),
          'product' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '[/:lang]/product[-:id][-:page].html',
                    'constraints'=>array(
                        'lang'=>'[a-zA-Z]{2}',
                        'id'=>'\w*',
                        'page'=>'[0-9]*'
                    ),
                    'defaults' => array(
                        'controller' => 'Front\Controller\Category',
                        'action'     => 'product',
                        'lang'=>'',
                        'id'=>''
                    ),
                ),
            ),
            'detail'=>array(
                'type'=>'Segment',
                'options'=>array(
                   'route'=>'[/:lang]/[detail][-:id].html',
                    'constraints'=>array(
                        'lang'=>'[a-zA-Z]{2}',
                        'id'=>'[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Front\Controller\Detail',
                        'action'     => 'detail',
                        'lang'=>'',
                    ),
                )
            ),
            'download'=>array(
                'type'=>'Segment',
                'options'=>array(
                    'route'=>'/[down][-:id].html',
                    'constraints'=>array(

                        'id'=>'[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Front\Controller\Detail',
                        'action'     => 'down',

                    ),
                )
            )
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Front\Controller\Index' => 'Front\Controller\IndexController',
            'Front\Controller\Category' => 'Front\Controller\CategoryController',
            'Front\Controller\Detail' => 'Front\Controller\DetailController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(

            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'front/index/index' => __DIR__ . '/../view/front/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
     //       __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
