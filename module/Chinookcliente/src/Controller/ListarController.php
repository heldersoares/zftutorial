<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Chinookcliente\Controller;

use Chinookcliente\Model\ChinookListaClientesInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Description of ListarController
 *
 * @author Helder
 */

$ClientesRepository;

class ListarController extends AbstractActionController {
    //put your code here
    
    public function __construct(ChinookListaClientesInterface $ClientesRepository) {
        $this->ClientesRepository = $ClientesRepository;
        
    }

    function indexAction()
    {
        return new ViewModel();
    }
}
