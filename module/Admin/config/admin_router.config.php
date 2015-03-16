<?php
return array(

    'routes' => array(
        'admin-index' => array(
            'type' => 'Zend\Mvc\Router\Http\Segment',
            'options' => array(
                'route' => '[/:lang]/admin',
                'constraints' => array(
                    'lang' => '[a-zA-Z]{2}',

                ),
                'defaults' => array(
                    'controller' => 'Admin\Controller\Index',
                    'action' => 'index',

                ),
            ),
        ),
        'admin-front-pages' => array(
            'type' => 'Zend\Mvc\Router\Http\Segment',
            'options' => array(
                'route' => '[/:lang]/admin/pages[/:action].html',
                'constraints' => array(
                    'lang' => '[a-zA-Z]{2}',
                    'action' => '[a-zA-Z0-9]*',

                ),
                'defaults' => array(
                    'controller' => 'Admin\Controller\Pages',
                    'action' => 'home',

                ),
            ),
        ),
        'admin-file' => array(
            'type' => 'Zend\Mvc\Router\Http\Segment',
            'options' => array(
                'route' => '[/:lang]/admin/file[/:action].html',
                'constraints' => array(
                    'lang' => '[a-zA-Z]{2}',
                    'action' => '[a-zA-Z0-9]*',

                ),
                'defaults' => array(
                    'controller' => 'Admin\Controller\File',
                    'action' => 'index',
                ),
            ),
        ),
        'admin-product' => array(
            'type' => 'Zend\Mvc\Router\Http\Segment',
            'options' => array(
                'route' => '[/:lang]/admin/product[/:action].html',
                'constraints' => array(
                    'lang' => '[a-zA-Z]{2}',
                    'action' => '[a-zA-Z0-9]*',

                ),
                'defaults' => array(
                    'controller' => 'Admin\Controller\ProductManager',
                ),
            ),
        ),
        'show-products' => array(
            'type' => 'Zend\Mvc\Router\Http\Segment',
            'options' => array(
                'route' => '[/:lang]/admin/product[-:page].html',
                'constraints' => array(
                    'lang' => '[a-zA-Z]{2}',
                    'page' => '[0-9]+'
                ),
                'defaults' => array(
                    'controller' => 'Admin\Controller\ProductManager',
                    'action' => 'index',
                    'page'=>1
                ),
            ),
        ),

        'admin-category' => array(
            'type' => 'Zend\Mvc\Router\Http\Segment',
            'options' => array(
                'route' => '[/:lang]/admin/category[/:action].html',
                'constraints' => array(
                    'lang' => '[a-zA-Z]{2}',
                    'action' => '[a-zA-Z0-9]*',

                ),
                'defaults' => array(
                    'controller' => 'Admin\Controller\CategoryManager',
                    'action' => 'index',
                ),
            ),
        ),


    )
);
?>