<?php

namespace Botoes;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

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
                            'route'=>'/add/:texto',
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
                    'parcial' =>[
                        'type' => Segment::class,
                        'options' =>[
                            'route'=>'/parcial[/:id]',
                            'defaults' => [
                                'controller' => Controller\BotoesController::class,
                                'action' => 'parcial',
                             ],
                           
                        ],
                    ],
                    'ajax' =>[
                        'type' => Segment::class,
                        'options' =>[
                            'route'=>'/ajax[/:id]',
                            'defaults' => [
                                'controller' => Controller\BotoesController::class,
                                'action' => 'ajax',
                             ],
                           
                        ],
                    ],
                    'list' => [
                        'type' => Literal::class,
                        'options' => [
                            'route' => '/list',
                            'defaults' => [
                                'controller' => Controller\BotoesController::class,
                                'action' => 'list', 
       
                            ],
                        ],
                        
                    ]
                ],
            ],
        ],
    ],
    'view_manager'=>[
        'template_path_stack' => [
            __DIR__.'/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];