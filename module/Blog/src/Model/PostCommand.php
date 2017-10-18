<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Blog\Model;


/**
 * Description of PostCommand
 *
 * @author Helder
 */
class PostCommand implements PostCommandInterface {
     /**
     * {@inheritDoc}
     */
    public function insertPost(Post $post)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function updatePost(Post $post)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function deletePost(Post $post)
    {
    }//put your code here
}
