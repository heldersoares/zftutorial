<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Album\Form;

use Zend\Form\Form;

/**
 * Description of AlbumForm
 *
 * @author Helder
 */
class AlbumForm extends Form
{
    public function __construct($name = null) {
        
        parent::__construct('album');
        
        $this->add([
            'name' => 'id',
            'type' =>'hidden',
            
        ]);
        $this->add([
            'name' => 'title',
            'type'=>'text',
            'options' => [
                'label' => 'Título',
            ],
        ]);
        $this->add([
            'name' => 'artist',
            'type'=>'text',
            'options' => [
                'label' => 'Artista',
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type'=>'submit',
            'attributes' => [
                'value' => 'Go',
                'id' => 'submitbutton'
            ],
        ]);
    }
}
