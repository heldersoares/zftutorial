<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Chinookcliente\Model;

use InvalidArgumentException;
use RuntimeException;
use Chinookcliente\Model\ChinookCliente;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Sql;
use Zend\Hydrator\HydratorInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;




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
    private $db; //db Adapter
    private $hydrator; //HydratorInterface
    private $chinookclientePrototype; //ChinookCliente
    
    //O construtor aceita um parâmetro (Contructor Injection). Por isso é preciso escrever uma Factory
    public function __construct(AdapterInterface $db, HydratorInterface $hydrator, ChinookCliente $chinookclientePrototype) {
        $this->db = $db;
        $this->hydrator = $hydrator;
        $this->chinookclientePrototype = $chinookclientePrototype;
    }

    public function findAllClientes() {
        
        $sql = new Sql($this->db);
        $selecao = $sql->select();
        $selecao->from('customers');
        $selecao->columns(['nome'=>'FirstName','pais'=>'Country', 'id'=>'CustomerId']); //Quando se usa Reflection as designações das propriedades tem de ser iguais aos campos na BD
        $stmt = $sql->prepareStatementForSqlObject($selecao);
        $resultado = $stmt->execute();
        
        if (! $resultado instanceof ResultInterface || ! $resultado->isQueryResult()) {
        return [];
        }

        $resultSet = new HydratingResultSet($this->hydrator,$this->chinookclientePrototype);
        
        $resultSet->initialize($resultado);
        return $resultSet;
         
    }      

    public function findCliente($id) {
        
        $sql = new Sql($this->db);
        $selecao = $sql->select();
        $selecao->from('customers');
        $selecao->columns(['nome'=>'FirstName','pais'=>'Country', 'id'=>'CustomerId']);
        $selecao->where(['id=?'=>$id]);
        $stmt = $sql->prepareStatementForSqlObject($selecao);
        $resultado = $stmt->execute();
        
        if (! $resultado instanceof ResultInterface || ! $resultado->isQueryResult()) {
            throw new RuntimeException(sprintf('Falha ao retirar elemento com id "%s"; Erro na base de dados.',$id));
        }
        
        $resultSet = new HydratingResultSet($this->hydrator,$this->chinookclientePrototype);
        $resultSet->initialize($resultado);
        $cliente= $resultSet->current();
        
        if (! $cliente){
            throw new InvalidArgumentException (sprintf('Cliente com identificação "%s" não existente,',$id));
        }
        
        return $cliente;
        
    }

    
}
