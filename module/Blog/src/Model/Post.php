<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Blog\Model;

/**
 * Description of Post
 *
 * @author Helder
 */
class Post {
    
    private $id;
    private $text;
    private $title;
    
    public function __construct($title, $text, $id = null) {
        
        $this->id = $id;
        $this->text = $text;
        $this->title = $title;
    }

    public function getId() {
        return $this->id;
    }

    public function getText() {
        return $this->text;
    }

    public function getTitle() {
        return $this->title;
    }


    

   
}
