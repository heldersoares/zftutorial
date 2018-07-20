<?php

namespace Botoes\Controller;

use Botoes\Model\PedidoRepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

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
        //Buscar dados ao repositório
        $dados = $this->repositorio->findAllPedidos();
        $view = new ViewModel(['eventos'=> $dados]);
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
 
        //array de teste
        $linha = array('id'=>'Estado de sitio');
        
        $request= $this->getRequest();
        $query = $request->getQuery();
                
        if ($request->isXmlHttpRequest() || $query->get('showJson')== 1){
            
            $view = new JsonModel($linha);
            //$view->setTerminal(true);
        }
        else {
            $view= new ViewModel();
        }
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