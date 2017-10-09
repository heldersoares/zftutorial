<?php

namespace Blog;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router'=>[
        'routes'=>[
            'blog'=>[
                'type'=> Literal::class,
                'options'=>[
                    'route'=>'/blog',
                    'defaults'=> [
                        'controller'    =>Controller\ListController::class,
                        'action'        =>'index',    
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\ListController::class => InvokableFactory::class,
        ],
    ],
    'view_manager'=>[
        'template_path_stack' => [
            __DIR__.'/../view',
        ],
    ],
];


