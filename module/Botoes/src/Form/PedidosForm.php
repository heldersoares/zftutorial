<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Botoes\Form;

use Zend\Form\Form;
use Zend\Form\Element;

/**
 * Description of PostForm
 *
 * @author Helder
 */
class PedidosForm extends Form {
    //put your code here
    public function init()
    {
        
        $clicar =new Element('Clicar');
        $clicar->setValue('Submeter');
        $clicar->setAttributes(['type'=>'button']);
        $this->add($clicar);
        
        
        
        
    }
    
}