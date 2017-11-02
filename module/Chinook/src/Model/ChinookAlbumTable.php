<?php

namespace Chinook\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
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

    public function fetchAll()  //retorna um resultset
    {
        //criação de query com join usando o Select da biblioteca ZEND\DB\SQL
        $select = new Select() ;
        $select->from('albums');
        $select->columns(array('AlbumId','Title'));
        $select->join('artists', "artists.ArtistID = albums.ArtistId", array('Name'), 'left');
        //echo $select->getSqlString();
        $resultSet = $this->ChinooktableGateway->selectWith($select); 
        //var_dump($resultSet);
        return $resultSet;
        
        
        
       
    }
    
}
