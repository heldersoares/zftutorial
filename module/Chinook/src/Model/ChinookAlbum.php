<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Chinook\Model;

/**
 * Description of ChinookAlbum
 *
 * @author Helder
 * * 
 */



class ChinookAlbum {
    //Vamos implementar através do TableGateway
    //Por isso tem de ter o método exchangeArray
    public $id;
    public $artista;
    public $titulo;
    
    public function exchangeArray(array $dados)
    {
        //Nos dados tenho que colocar os campos como estão na tabela
        $this->id       = !empty($dados['AlbumId']) ? $dados['AlbumId']:null;
        $this->artista  = !empty($dados['Name']) ? $dados['Name']:null;
        $this->titulo   = !empty($dados['Title']) ? $dados['Title']:null;
    }
            
}
