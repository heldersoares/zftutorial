<?php

namespace Botoes;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    
    'service_manager' => [
        'aliases' => [
            Model\PedidoRepositoryInterface::class => Model\PedidoRepository::class,
            Model\PedidoCommandInterface::class => Model\PedidoCommand::class,
        ],
        'factories' => [
            Model\PedidoRepository::class => Factory\PedidoRepositoryFactory::class,
            Model\PedidoCommand::class => Factory\PedidoCommandFactory::class,
            
        ]
    ],
    'controllers' => [
        'factories' => [
            Controller\BotoesController::class => Factory\BotoesControllerFactory::class ,
            Controller\WriteController::class => Factory\WriteControllerFactory::class,
        ]
    ],
    'router'=>[
        'routes'=>[
            'botoes'=>[
                'type'=> Literal::class,
                'options'=>[
                    'route'=>'/botoes',
                    'defaults'=> [
                        'controller'    => Controller\BotoesController::class,
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
                                'controller' => Controller\WriteController::class,
                                'action' => 'add',
                             ],
                           
                        ],
                    ],
                    'detalhe' =>[
                        'type' => Segment::class,
                        'options' =>[
                            'route'=>'/detail[/:id]',
                            'defaults' => [
                                'controller' => Controller\BotoesController::class,
                                'action' => 'detail',
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