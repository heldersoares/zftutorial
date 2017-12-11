<?php

namespace ChinookCliente;

use Zend\Router\Http\Literal;

return [
    'controllers' => [
        'factories' => [
            Controller\ListarController::class => InvokableFactory::class,
        ],
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


