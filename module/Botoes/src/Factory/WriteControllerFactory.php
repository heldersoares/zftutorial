<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Botoes\Factory;

/**
 * Description of PedidoRepositoryFactory
 *
 * @author Helder
 */

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Botoes\Model\PedidoCommandInterface;
use Botoes\Controller\WriteController;

class writeControllerFactory implements FactoryInterface {
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null){
        
        return new WriteController($container->get(PedidoCommandInterface::class));
    }

}
