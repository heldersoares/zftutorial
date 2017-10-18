<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Blog\Model;

use DomainException;

/**
 * Description of PostRepository
 *
 * @author Helder
 */
class PostRepository implements PostRepositoryInterface
{
    
    private $data = [
        1 => [
            'id'    => 1,
            'title' => 'Hello World #1',
            'text'  => 'This is our first blog post!',
        ],
        2 => [
            'id'    => 2,
            'title' => 'Hello World #2',
            'text'  => 'This is our second blog post!',
        ],
        3 => [
            'id'    => 3,
            'title' => 'Hello World #3',
            'text'  => 'This is our third blog post!',
        ],
        4 => [
            'id'    => 4,
            'title' => 'Hello World #4',
            'text'  => 'This is our fourth blog post!',
        ],
        5 => [
            'id'    => 5,
            'title' => 'Hello World #5',
            'text'  => 'This is our fifth blog post!',
        ],
    ];
    
    public function findAllPosts()
    {
        return array_map(function($post){
            return new Post(
                    $post['title'],
                    $post['text'],
                    $post['id']
                    );
        },$this->data);
        
    }
    
    public function findPost($id)
    {
        if (! isset($this->data[$id])) {
            throw new DomainException(sprintf('Post com id "%s" não foi encontrado', $id));
        }
        
        return new Post(
                    $post['title'],
                    $post['text'],
                    $post['id']
                    );
        
    }
        
}
