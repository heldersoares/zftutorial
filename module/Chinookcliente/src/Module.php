<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Chinookcliente;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Description of Module
 *
 * @author Helder
 */
class Module implements ConfigProviderInterface
{
    
    public function getConfig()
    {
        return include __DIR__.'/../config/module.config.php';
    }
}
