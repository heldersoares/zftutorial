<?php

namespace Blog\Controller;

use Blog\Form\PostForm;
use Blog\Model\Post;
use Blog\Model\PostCommandInterface;
use Blog\Model\PostRepositoryInterface;
use InvalidArgumentException;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class WriteController extends AbstractActionController
{
    private $command;
    private $form;
    private $repository;
    
    public function __construct(PostCommandInterface $command,PostForm $form, PostRepositoryInterface $repository) {
        $this->command = $command;
        $this->form = $form;
        $this->repository = $repository;
    }

    public function addAction()
    {
        $request = $this->getRequest();
        $viewModel = new ViewModel(['form' => $this->form]);
        
        if (! $request->isPost()) {
            return $viewModel;
        }
        
        $this->form->setData($request->getPost());
        
        if (! $this->form->isValid()) {
            return $viewModel;
        }
        
        //$data = $this->form->getData()['post']; //post definido no PostForm
        //$post = new Post($data['title'], $data['text']);
        
        $post = $this->form->getData();  //o hydrator permite logo devolver uma instance POST
        
        try{
            $post = $this->command->insertPost($post);
            
        } catch (Exception $ex) {
            throw $ex;
        }
                
        return $this->redirect()->toRoute('blog/detail', ['id' => $post->getId()]);
        
    }
        
    public function editAction()
    {
        $id = $this->params()->fromRoute('id');
        if (! $id) {
            return $this->redirect()->toRoute('blog');
        }
        try {
            $post = $this->repository->findPost($id);
        } catch (InvalidArgumentException $ex) {
                return $this->redirect()->toRoute('blog');
        }
        $this->form->bind($post);
        $viewModel = new ViewModel(['form'=> $this->form]);
        $request = $this->getRequest();
        if (! $request->isPost()) {
            return $viewModel;
        }
        $this->form->setData($request->getPost());
        if (! $this->form->isValid()) {
            return $viewModel;
        }
        $post = $this->command->updatePost($post);
        return $this->redirect()->toRoute(
                'blog/detail',
                ['id' => $post->getId()]
        );
    }
    
}