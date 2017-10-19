<?php

namespace Botoes\Factory;

use Botoes\Controller\BotoesController;
use Botoes\Form\PedidosForm;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;


class BotoesControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return WriteController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $formManager = $container->get('FormElementManager');
        
        return new BotoesController(
            $formManager->get(PedidosForm::class)
            
        );
    }
}