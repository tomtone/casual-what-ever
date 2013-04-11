<?php
/**
 * @author Marco Bunge
 * @copyright 2012 Marco Bunge <efika@rubymatrix.de>
 */

namespace GameunitTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class UnitControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        $this->setApplicationConfig(
            include __DIR__ . '/../../../../../config/application.config.php'
        );
        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/unit');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Gameunit');
        $this->assertControllerName('gameunit');
        $this->assertControllerClass('AlbumController');
        $this->assertMatchedRouteName('album');
    }
}