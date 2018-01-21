<?php

namespace Botoes;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    
    'service_manager' => [
        'aliases' => [
            Model\PedidoRepositoryInterface::class => Model\PedidoRepository::class,
        ],
        'factories' => [
            Model\PedidoRepository::class => Factory\PedidoRepositoryFactory::class,
        ]
    ],
    'controllers' => [
        'factories' => [
            Controller\BotoesController::class => Factory\BotoesControllerFactory::class ,
        ]
    ],
    'router'=>[
        'routes'=>[
            'botoes'=>[
                'type'=> Literal::class,
                'options'=>[
                    'route'=>'/botoes',
                    'defaults'=> [
                        'controller'    =>Controller\BotoesController::class,
                        'action'        =>'index',    
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'adiciona' =>[
                        'type' => Segment::class,
                        'options' =>[
                            'route'=>'/add',
                            'defaults' => [
                                'action' => 'add',
                             ],
                           
                        ],
                    ],
                ],
            ],
        ],
    ],
    'view_manager'=>[
        'template_path_stack' => [
            __DIR__.'/../view',
        ],
    ],
];