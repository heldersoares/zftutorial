<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Botoes\Controller;

use Botoes\Model\Pedido;
use Botoes\Model\PedidoCommandInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Description of WriteController
 *
 * @author Helder
 */
class WriteController extends AbstractActionController {
    
    private $command; //do tipo PostCommandInterface
    
    
    public function __construct(PedidoCommandInterface $command) {
        $this->command = $command;
    }
    
    public  function addAction() {
        // depois hei-de introduzir como parâmetro o texto a ser incluído
        //Por agora vou apenas executar o insertPost que vai introduzir uma linha
        
        $texto = $this->params('texto','Texto Default');
        $pedido= new Pedido('',$texto,date('c'),'',1);
        $pedido = $this->command->insertPedido($pedido);
    
        return $this->redirect()->toRoute('botoes');
 
    }

    
    
    
    
}
