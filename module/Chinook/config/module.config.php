<?php

namespace Chinook;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router'=>[
        'routes'=>[
            'chinook'=>[
                'type'=> Segment::class,
                'options'=>[
                    'route'=>'/chinook[/:action[/:id]]',
                    'constrains' => [
                        'action' =>'[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+'
                    ],
                    'defaults'=> [
                        'controller'    =>Controller\ChinookController::class,
                        'action'        =>'index',
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


