<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace BotoesTest\Controller;

use Botoes\Controller\BotoesController;
use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class BotoesControllerTest extends AbstractHttpControllerTestCase
{
    
    protected $traceError= true;
    
    public function setUp()
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));

        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {   
        
        
        $this->dispatch('/botoes');
        $this->assertResponseStatusCode(200);
      
        /*$this->assertModuleName('Botoes');
        $this->assertControllerName(BotoesController::class); // as specified in router's controller name alias
        $this->assertControllerClass('BotoesController');
        $this->assertMatchedRouteName('botoes');
     */
    }
}
