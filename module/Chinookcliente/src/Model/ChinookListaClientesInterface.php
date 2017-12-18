<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Cada resultado deve ser um objeto do tipo ChinookCliente
 */

namespace Chinookcliente\Model;

/**
 *
 * @author Helder
 */
interface ChinookListaClientesInterface {
    //Métodos para listar clientes
    
    public function findAllClientes();
    // método para ver todos os clientes
    // @return ChinookCliente
    
    public function findCliente($id);
    // método para localizar um cliente específico
    // @return ChinookCliente
    
}
