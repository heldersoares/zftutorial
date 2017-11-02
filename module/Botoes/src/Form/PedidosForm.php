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
        
        $Item1 =new Element('Item1');
        $Item1->setValue('Item1');
        $Item1->setAttributes(['type'=>'button']);
        $this->add($Item1);
        
        $Item2 =new Element('Item2');
        $Item2->setValue('Item2');
        $Item2->setAttributes(['type'=>'button']);
        $this->add($Item2);
        
        
    }
    
}
