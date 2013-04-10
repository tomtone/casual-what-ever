<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'controllers' => array(
        'invokables' => array(
            'Buildings\Index' => 'Buildings\Controller\IndexController'
        ),
    ),
    'router' => array(
        'routes' => array(
            'units' => array(
                'type' => 'Literal',
                'priority' => 1000,
                'options' => array(
                    'route' => '/units',
                    'defaults' => array(
                        'controller' => 'gameunit\index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'unit' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/unit[/:action]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'gameunit\unit',
                                'action' => 'index',
                            ),
                        ),
                    ),
                    'buildings' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/building[/:action]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'gameunit\building',
                                'action' => 'index',
                            ),
                        ),
                    ),
                    'resources' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/resource[/:action]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'gameunit\resource',
                                'action' => 'index',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'unit' => __DIR__ . '/../view',
        ),
    ),
);
