<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Botoes\Model;

use Botoes\Model\Pedido;
use Botoes\Model\PedidoCommandInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Insert;
use Zend\Db\Adapter\AdapterInterface;


/**
 * Description of PedidoCommand
 *
 * @author Helder
 */
class PedidoCommand implements PedidoCommandInterface     {
    
    
   private $db; //apaterInterface para base de dados
   
   public function __construct(AdapterInterface $db) {
       $this->db = $db;
   }

   public function insertPedido(Pedido $pedido) {
        
        $insert = new Insert('registo');
        $insert->values([
            'textobotao' => $pedido->getTextobotao(),
            'entrada' => $pedido->getEntrada(),
            'estadoId' => $pedido->getEstadoId(),
        ]);
        $sql = new Sql($this->db);
        $statement = $sql->prepareStatementForSqlObject($insert);
        $result = $statement->execute();
        
        //$id = $result->getGeneratedValue();
        
        return;
        /*
         *
        
        return new Pedido(
                $result->getGeneratedValue(),
                $pedido->getTextobotao(),
                $pedido->getEntrada(),
                $pedido->getFinalizado(),
                $pedido->getEstadoId()
                );
         * 
         */
    }

    public function updatePedido(Pedido $pedido) {
        
    }

}
