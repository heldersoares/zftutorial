<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Chinookcliente\Model;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Sql;

/**
 * Description of ListaClientes
 * Repositório de clientes da tabela Customers da Base de dados Chinook
 * @author Helder
 * 
 * 
 */
     
class ChinookListaClientesRepository implements ChinookListaClientesInterface {
    //put your code here
    //é preciso um AdapterInterface para ligar com a base de dados
    private $db;
    
    
    //O construtor aceita um parâmetro (Contructor Injection). Por isso é preciso escrever uma Factory
    public function __construct(AdapterInterface $db) {
        $this->db = $db;
    }

    public function findAllClientes() {
        
        $sql = new Sql($this->db);
        $selecao = $sql->select('customers');
        $stmt = $sql->prepareStatementForSqlObject($selecao);
        $resultado = $stmt->execute();
        return $resultado;
    }

    public function findCliente($id) {
        
    }

    
}
