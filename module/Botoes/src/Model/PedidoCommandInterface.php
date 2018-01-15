<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Botoes\Model;

/**
 * Interface para comandos de inserir e alterar Pedidos
 * Não vou permitir funcionalidade de apagar pedidos
 * @author Helder
 */
interface PedidoCommandInterface {
    //put your code here
    public function insertPedido(Pedido $pedido);
    
    public function updatePedido(Pedido $pedido);
}
