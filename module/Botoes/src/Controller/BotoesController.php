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
    
    public function detailAction()
    {
         $id = $this->params()->fromRoute('id');
        
        try {
            $pedido = $this->repositorio->findPedido($id);
        } catch (\InvalidArgumentException $ex) {
            return $this->redirect()->toRoute('botoes');
        }
        return new ViewModel(['pedido' => $pedido]);
        
    }
    
    public function parcialAction() {
        
        return new ViewModel(['pedidos'=>$this->repositorio->findAllPedidos()]);
    }
            
}