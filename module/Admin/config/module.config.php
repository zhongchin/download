<?php
return array(
    'router' => include __DIR__.'/admin_router.config.php',
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Index' => 'Admin\Controller\IndexController',
            'Admin\Controller\Pages' => 'Admin\Controller\PagesController',
            'Admin\Controller\File' => 'Admin\Controller\FileController',
            'Admin\Controller\ProductManager' => 'Admin\Controller\ProductManagerController',
            'Admin\Controller\CategoryManager' => 'Admin\Controller\CategoryManagerController',

        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(

            'admin/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);