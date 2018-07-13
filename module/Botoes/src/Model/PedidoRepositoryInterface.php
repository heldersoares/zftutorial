<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Botoes\Model;

/**
 * Interface que permite Listar todos os pedidos ou apoenas um pedido específico
 * @author Helder
 */
interface PedidoRepositoryInterface {
    //put your code here
    public function findAllPedidos();
    
    public function findPedido($id);
    
    public function findPedidoData($datainicio, $datafim);
    //permite filtrar entrada de eventos com base em duas datas (podem ser as mesmas para um só dia)
}
