<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Botoes\Model;


use InvalidArgumentException;
use RunTimeException;
use Botoes\Model\PedidoRepositoryInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Sql;
use Zend\Hydrator\HydratorInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Adapter\Driver\ResultInterface;
use DateTime;




/**
 * Description of PedidoRepository
 *
 * @author Helder
 */
class PedidoRepository implements PedidoRepositoryInterface {
    
    private $db; //instância da base de dados
    private $hydrator;
    private $pedidoPrototype;
    
    public function __construct(AdapterInterface $db, HydratorInterface $hydrator, Pedido $pedidoPrototype ) {
        $this->db = $db;
        $this->hydrator = $hydrator;
        $this->pedidoPrototype = $pedidoPrototype;
    }

    public function findAllPedidos() {
        
        $sql = new Sql($this->db);
        $select = $sql->select();
        $select->from('registo');
        //$select->where->between('entrada','2018-04-10','2018-04-15'); //para testes
        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();
        
        /* Para testes
        if ($result instanceof ResultInterface && $result->isQueryResult()){
            $resultSet = new ResultSet();
            $resultSet->initialize($result);
            //$emArray = $resultSet->toArray();
            //echo $emArray[0]['textobotao'];
            //var_export($resultSet);
            //die();
        }
        */
        
        if (! $result instanceof ResultInterface || ! $result->isQueryResult()){
            return [];
        }
        $resultSet = new HydratingResultSet($this->hydrator, $this->pedidoPrototype);
        $resultSet->initialize($result);
        return $resultSet;
    }

    public function findPedido($id) {
        
        $sql = new Sql($this->db);
        $select = $sql->select('registo');
        $select->where(['id=?'=> $id]);
        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();
        
        if (! $result instanceof ResultInterface || ! $result->isQueryResult()){
            throw new RuntimeException(sprintf('Falha na consulta do item %s',$id));
        }
        
        $resultSet = new HydratingResultSet($this->hydrator, $this->pedidoPrototype);
        $resultSet->initialize($result);
        $pedido = $resultSet->current();
        
        if (! $pedido) {
            throw new InvalidArgumentException(sprintf('( foi encontrado pedido %s',$id));
        }
     
        return $pedido;
        
    }
    
    public function findPedidoData($datainicio,$datafim) {
        
        //verificação se datainicio é menor que datafim é feito no script de entrada
        
        
        $sql = new Sql($this->db);
        $select = $sql->select();
        $select->from('registo');
        $select->where->between('entrada',$datainicio,$datafim);
        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();
        
        if (! $result instanceof ResultInterface || ! $result->isQueryResult()){
            throw new RuntimeException(sprintf('Falha na consulta do item %s',$data));
        }
        
        $resultSet = new HydratingResultSet($this->hydrator, $this->pedidoPrototype);
        $resultSet->initialize($result);
        
        return $resultSet;
        
    }

    
    
}
