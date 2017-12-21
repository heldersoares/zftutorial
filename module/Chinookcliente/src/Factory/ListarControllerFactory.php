<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Chinookcliente\Factory;

use Chinookcliente\Controller\ListarController;
use Chinookcliente\Model\ChinookListaClientesInterface;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;


/**
 * Description of ListarClientesFactory
 *
 * @author Helder
 */
class ListarControllerFactory implements FactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ListarController($container->get(ChinookListaClientesInterface::class));
        //a fábrica tem de ser registada no module.config.php
    }
    
}
