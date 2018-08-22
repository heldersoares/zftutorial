<?php

namespace Botoes\Controller;

use Botoes\Model\PedidoRepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use DateTime;

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
        $eventos=$this->repositorio->findAllPedidos();
        $request= $this->getRequest();
        $query = $request->getQuery();
                
        if ($request->isXmlHttpRequest() || $query->get('showJson')== 1){
            //passar de objeto para array de eventos
            $jsonData=[];
            $idx =0;
            foreach ($eventos as $evento){
                $texto = $evento->getTextobotao();
                $datatempo = new DateTime($evento->getEntrada());
                $data = $datatempo->format('d/m/Y');
                $hora = $datatempo->format('H:i:s');
                $temp= ['Texto'=> $texto, 'Data' => $data, 'Hora' => $hora];
                $jsonData[$idx++] = $temp;
            }
            $view = new JsonModel($jsonData);
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