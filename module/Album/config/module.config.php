<?php

namespace Album;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router'=>[
        'routes'=>[
            'album'=>[
                'type'=> Segment::class,
                'options'=>[
                    'route'=>'/album[/:action[/:id]]',
                    'constrains' => [
                        'action' =>'[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+'
                    ],
                    'defaults'=> [
                        'controller'    =>Controller\AlbumController::class,
                        'action'        =>'index',
                    ],
                    
                ],
                    
            ],
        ],
    ],
    //removido porque fizemos esta definição em getControllerConfig em Album\Module
    //'controllers' => [
    //    'factories' => [
    //        Controller\AlbumController::class => InvokableFactory::class,
    //    ],
    //],
    'view_manager'=>[
        'template_path_stack' => [
            __DIR__.'/../view',
        ],
    ],
];


