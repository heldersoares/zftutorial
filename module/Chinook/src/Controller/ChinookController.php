<?php

namespace Chinook\Controller;

use Chinook\Model\ChinookAlbumTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class ChinookController extends AbstractActionController
{
    
    private $tabela;
    
    public function __construct(ChinookAlbumTable $table)
    {
        $this->tabela = $table;
    }

    
    public function indexAction()
    {
        //Eata ação vai listar todos os albums e respetivos artistas
        return new ViewModel(['albums' => $this->tabela->fetchAll(),]);  
    }
    
}