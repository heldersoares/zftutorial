<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Chinook;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Description of Module
 *
 * @author Helder
 */
class Module implements ConfigProviderInterface 
{
    //put your code here
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    
    
    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\ChinookAlbumTable::class => function($container) {
                    $tableGateway = $container->get(Model\ChinookAlbumTableGateway::class);
                    return new Model\ChinookAlbumTable($tableGateway);
                },
                Model\ChinookAlbumTableGateway::class =>function ($container) {
                    $dbAdapter = $container->get('dbchinook');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\ChinookAlbum());
                    return new TableGateway('albums',$dbAdapter, null, $resultSetPrototype);
                },
                
            ],
        ];
    }    
     public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\ChinookController::class => function($container) {
                    return new Controller\ChinookController(
                        $container->get(Model\ChinookAlbumTable::class)
                    );
                },
            ],
        ];
    }
    
}
