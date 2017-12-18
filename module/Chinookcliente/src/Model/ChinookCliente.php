<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Chinookcliente\Model;

/**
 * Description of Cliente: lista de entidades retiradas da base de dados Chinook
 *
 * @author Helder
 */
class ChinookCliente {
    
    // nesta aplicação só quero o nome e o país, pelo que vou ter as seguintes propriedades
    
    private $id;
    private $nome;
    private $pais;
    
    public function __construct($nome, $pais, $id = null) {
        
        $this->nome = $nome;
        $this->pais = $pais;
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPais() {
        return $this->pais;
    }


    
    
}
