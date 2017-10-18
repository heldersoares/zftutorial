<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Blog\Factory;

use Interop\Container\ContainerInterface;
use Blog\Model\ZendDbSqlCommand;
use Zend\Db\Adapter\AdapterInterface;
use Zend\ServiceManager\Factory\FactoryInterface;


/**
 * Description of ZendDbSqlCommandFactory
 *
 * @author Helder
 */
class ZendDbSqlCommandFactory implements FactoryInterface {
    //put your code here
    
    public function __invoke(ContainerInterface $container, $requestName, array $options = null)
    {
        return new ZendDbSqlCommand($container->get(AdapterInterface::class));
        
    }
    
}
