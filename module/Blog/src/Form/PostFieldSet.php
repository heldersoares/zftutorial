<?php

namespace Blog\Form;

use Zend\Form\Fieldset;
use Blog\Model\Post;
use Zend\Hydrator\Reflection as ReflectionHydrator;


/**
 * Description of PostFieldSet
 *
 * @author Helder
 */
class PostFieldSet extends Fieldset {
    
    public function init()
    {
        $this->add([
            'type' => 'hidden',
            'name'=> 'id',
        ]);
        
        $this->add([
            'type'=>'text',
            'name' => 'title',
            'options' => [
                'label' => 'Postar título',
                
            ],
        ]);
        
        $this->add([
            'type'=> 'textarea',
            'name' => 'text',
            'options' => [
                'label' => 'Postar texto',
                
            ],
        ]);
        
        //Hydrator
        $this->setHydrator(new ReflectionHydrator());
        $this->setObject(new Post('',''));
        
    }
    
  
    
    
}
