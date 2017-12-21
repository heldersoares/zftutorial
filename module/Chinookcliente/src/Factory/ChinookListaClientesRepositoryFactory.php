<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Chinookcliente\Factory;
use Chinookcliente\Model\ChinookListaClientesRepository;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Description of ChinookListaClientesRepositoryFactory
 *
 * @author Helder
 */
class ChinookListaClientesRepositoryFactory implements FactoryInterface {
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ChinookListaClientesRepository($container->get('tutorial'));
        //a fábrica tem de ser registada no module.config.php
    }

    
  
    
    
}
