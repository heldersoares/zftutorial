<?php

namespace Botoes\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Botoes\Model\PedidoRepositoryInterface;


class BotoesController extends AbstractActionController
{
   
    //Array com valores de teste; a boa prática será colocar estes dados num Model
    private $ListaTeste = ["Item 1", "Item 2"];  
    private $repositorio;
    
    public function __construct(PedidoRepositoryInterface $pedidoRepository)
    {
       $this->repositorio = $pedidoRepository;
    }
    public function indexAction()
    {
        return new ViewModel(['pedidos'=>$this->repositorio->findAllPedidos()]);
    }
    
    public function detailAction()
    {
        //Buscar id da route
        $id = $this->params()->fromRoute('id');
        
        //colocar aqui hestão das exceções para reencaminhar utilizador logo pra sítio certo
        
        return new ViewModel(['pedido'=> $this->repositorio->findPedido($id)]);
    }
    
            
}