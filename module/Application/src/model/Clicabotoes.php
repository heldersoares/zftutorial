<?php

namespace Application\Model;

class Clicabotoes
{
    public $id;
    public $nome;
    

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->nome   = !empty($data['artist']) ? $data['nome'] : null;
        
    }
}

