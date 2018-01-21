<?php

namespace Botoes\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Botoes\Model\PedidoRepositoryInterface;


class BotoesController extends AbstractActionController
{
   
    //Array com valores de teste; a boa prática será colocar estes dados num Model
    private $repositorio;
    
    public function __construct(PedidoRepositoryInterface $pedidoRepository)
    {
       $this->repositorio = $pedidoRepository;
    }
    public function indexAction()
    {
        return new ViewModel(['pedidos'=>$this->repositorio->findAllPedidos()]);
    }
    
    public function addAction()
    {
        
        return new ViewModel();
    }
    
            
}