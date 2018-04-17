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
        
        $view = new ViewModel();
        $view->setTemplate('botoes/botoes/index'); //penso ser redundante
        $listaView = new viewModel(['eventos' => $this->repositorio->findAllPedidos()]);
        $listaView->setTemplate('botoes/botoes/list');
        $view->addChild($listaView,'listagem');

        return $view;
    }
   
    public function listAction() {
        
        $lista= $this->repositorio->findAllPedidos();
        $listview = new ViewModel(['eventos' => $lista]);
        return $listview;
        
    }
    
    public function parcialAction() {
        
        $view= new ViewModel();
        
        
        return $view;
    } 
    
    public function ajaxAction() {
        
        
        $view = new ViewModel();
        
        
        return $view;
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
}