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
            'gameunit\index' => 'Gameunit\Controller\IndexController',
            'gameunit\unit' => 'Gameunit\Controller\UnitController',
            'gameunit\building' => 'Gameunit\Controller\BuildingController',
            'gameunit\resource' => 'Gameunit\Controller\ResourceController',
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
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/unit',
                            'defaults' => array(
                                'controller' => 'gameunit\unit',
                                'action' => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'details' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/details[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]*',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'gameunit\unit',
                                        'action' => 'details',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'building' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/building',
                            'defaults' => array(
                                'controller' => 'gameunit\building',
                                'action' => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'details' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/details[/:id]',
                                    'constraints' => array(
                                        'id' => '[0-9]*',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'gameunit\building',
                                        'action' => 'details',
                                    ),
                                ),
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
