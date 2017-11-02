<?php

namespace Chinook\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface ;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ChinookAlbumTable
 *
 * @author Helder
 */
class ChinookAlbumTable {
    
    private $ChinooktableGateway;
    
    public function __construct(TableGatewayInterface $tableGateway) {
        $this->ChinooktableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->ChinooktableGateway->select();
    }
    
}
