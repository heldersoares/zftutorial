<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\DownloadController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'navigation' => [
        'default' => [
            [
                'label' => 'Início',
                'route' => 'home',
            ],
            [
                'label' => 'Album',
                'route' => 'album',
                'pages' => [
                    [
                        'label' => 'Inicio',
                        'route' => 'album'
                    ],
                    [
                        'label'  => 'Adiciona',
                        'route'  => '/add',
                        
                    ],
                    [
                        'label'  => 'Editar',
                        'route'  => 'album/edit',
                        
                    ],
                    [
                        'label'  => 'Apagar',
                        'route'  => 'album/delete',
                        
                    ],
                ],
            ],
            [
                'label' => 'Blog',
                'route' => 'blog',
                'pages' => [
                    [
                        'label' => 'Início',
                        'route' => 'blog'
                    ],
                    [
                        'label'  => 'Adiciona',
                        'route'  => 'blog/add',
                        
                    ],
                    [
                        'label'  => 'Editar',
                        'route'  => 'blog/edit',
                        
                    ],
                    [
                        'label'  => 'Apagar',
                        'route'  => 'blog/delete',
                        
                    ],
                ],    
            ],
            [
                'label' => 'Eventos',
                'route' => 'botoes',
                'pages' => [
                    [
                        'label' => 'Inicio',
                        'route' => 'botoes',
                    ],
                    [
                        'label'  => 'Filtrar',
                        'route'  => 'botoes/ajax',
                        'action' => 'ajax',
                    ],
                    
                ],
            ],
            [
                'label' => 'Chinook',
                'route' => 'chinook',
                
            ],
        ],
    ],
];
