<?php

namespace Botoes\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Botoes\Form\PedidosForm;


class BotoesController extends AbstractActionController
{
    private $form; //form a ser trnsmitido
            
    public function __construct(PedidosForm $form)
    {
        $this->form = $form;
    }
    public function indexAction()
    {
        return new ViewModel(['form' => $this->form]);
    }
    
            
}