<?php

namespace Chinookcliente;

use Zend\Router\Http\Literal;

return [
    
    
    'controllers' => [
        'factories' => [
            Controller\ListarController::class => Factory\ListarControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'aliases'=> [
            Model\ChinookListaClientesInterface::class => Model\ChinookListaClientesRepository::class,
        ],
        'factories' => [
            Model\ChinookListaClientesRepository::class => Factory\ChinookListaClientesRepositoryFactory::class,
        ]
    ],
    
    //Router
    'router' => [
        'routes' => [
            'clientes' => [
                'type' => Literal::class,
                'options' =>  [
                    'route' => '/clientes',
                    'defaults' => [
                        'controller' => Controller\ListarController::class,
                        'action' => 'index',
                    ],
                ],

            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__.'/../view',
        ],
    ],
];


