<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Botoes\Model;

/**
 * Description of Pedido
 *
 * @author Helder
 */

class Pedido {
    
    
    // Propriedades decorrem da estrutura da tabela em SQLITE registo da db Botoes
    private $id;
    private $textobotao;
    private $entrada;
    private $finalizado;
    private $estadoId;
    
    public function __construct($id = null, $textobotao, $entrada, $finalizado, $estadoId) {
        $this->id = $id;
        $this->textobotao = $textobotao;
        $this->entrada = $entrada;
        $this->finalizado = $finalizado;
        $this->estadoId = $estadoId;
    }

    public function getId() {
        return $this->id;
    }

    public function getTextobotao() {
        return $this->textobotao;
    }

    public function getEntrada() {
        return $this->entrada;
    }

    public function getFinalizado() {
        return $this->finalizado;
    }

    public function getEstadoId() {
        return $this->estadoId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTextobotao($textobotao) {
        $this->textobotao = $textobotao;
    }

    public function setEntrada($entrada) {
        $this->entrada = $entrada;
    }

    public function setFinalizado($finalizado) {
        $this->finalizado = $finalizado;
    }

    public function setEstadoId($estadoId) {
        $this->estadoId = $estadoId;
    }
}
