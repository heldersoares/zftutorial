<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    // The "about" action
    public function aboutAction() 
    {              
        $appName = 'HelloWorld';
        $appDescription = 'A sample application for the Using Zend Framework 3 book';
    
        // Return variables to view script with the help of
        // ViewModel variable container
        return new ViewModel([
            'appName' => $appName,
            'appDescription' => $appDescription
    ]);
   
}
}
