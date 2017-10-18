<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Blog\Model;

use RuntimeException;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\Sql\Delete;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Update;


/**
 * Description of ZendDbSqlCommand
 *
 * @author Helder
 */
class ZendDbSqlCommand implements PostCommandInterface  {
    
    //put your code here
    
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function insertPost(Post $post)
    {
        $insert = new Insert('posts');
        $insert->values([
            'title' => $post->getTitle(),
            'text' => $post->getText(),
        ]);
        
        $sql = new Sql($this->db);
        $statement = $sql->prepareStatementForSqlObject($insert);
        $result = $statement->execute();
        
        if (! $result instanceof ResultInterface) {
            throw new RuntimeException (
                    'Erro na base de dados durante a inserção de novo post'
                    );
            
        }
        $id = $result->getGeneratedValue();
        
        return new Post(
                $post->getTitle(),
                $post->getText(),
                $result->getGeneratedValue()
                );
        
    }
    
    public function deletePost(Post $post) {
        
        if (! $post->getId()) {
            throw new RuntimeException('Não consigo apagar post, identificador em falta');
        }
        
        $delete = new Delete('posts');
        
        $delete->where(['id=?'=>$post->getId()]);
        
        $sql = new Sql($this->db);
        $statement = $sql->prepareStatementForSqlObject($delete);
        $result = $statement->execute();
        
        if (! $result instanceof ResultInterface) {
            return false;
        }
        return true;
        
    }

    public function updatePost(Post $post) {
        if (! $post->getId()) {
            throw new RuntimeException('Não consigo atualizar post, identificador em falta');
        }
        
        $update = new Update('posts');
        $update->set([
            'title' => $post->getTitle(),
            'text'  => $post->getText(),
        ]);
        $update->where(['id=?'=>$post->getId()]);
        
        $sql = new Sql($this->db);
        $statement = $sql->prepareStatementForSqlObject($update);
        $result = $statement->execute();
        
        if (! $result instanceof ResultInterface) {
            throw new RuntimeException('Erro na base de dados na atualização do Post');
        }
        return $post;
    }
    


}
