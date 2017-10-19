<?php

namespace Botoes;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    
    
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
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\BotoesController::class => Factory\BotoesControllerFactory::class,
            
        ],
    ],
    'view_manager'=>[
        'template_path_stack' => [
            __DIR__.'/../view',
        ],
    ],
    ];


