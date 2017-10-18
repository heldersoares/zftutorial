<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Blog\Form;

use Zend\Form\Form;

/**
 * Description of PostForm
 *
 * @author Helder
 */
class PostForm extends Form {
    //put your code here
    public function init()
    {
        $this->add([
            'name' => 'post',
            'type' => PostFieldSet::class,
            'options' => [
                'use_as_base_fieldset' => true,
                
            ],
        ]);
        
        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Inserir novo post',
            ],
        ]);
    }
    
}
