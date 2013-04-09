<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Gameunit\Controller;

use Gameunit\Model\GameunitUnit;
use Gameunit\Model\GameunitUnitTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\XmlRpc\Client\Exception\HttpException;

class IndexController extends AbstractActionController
{

    protected $gameunitUnitTable;

    public function __construct()
    {
        // TODO: Implement __construct() method.
    }


    public function indexAction()
    {
//        $child = new ViewModel();
//        $child->setTemplate('gameunit/unit/index');

//        $this->getGameunitUnitTable();

        $this->getGameunitUnitTable();

        $units = $this->getGameunitUnitTable()->fetchAll();

        foreach($units as $unit){
            var_dump($unit);
        }

        $units = $this->forward()->dispatch('gameunit/unit',array('action' => 'index'));
        $buildings = $this->forward()->dispatch('gameunit/building',array('action' => 'index'));
        $resources = $this->forward()->dispatch('gameunit/resource',array('action' => 'index'));

        $vm = new ViewModel();
        $vm->addChild($units,'units');
        $vm->addChild($buildings,'buildings');
        $vm->addChild($resources,'resources');
        return $vm;
    }

    public function showAction()
    {
        return new ViewModel();
    }

    public function getGameunitUnitTable()
    {
        if (!$this->gameunitUnitTable) {
            $sm = $this->getServiceLocator();
            $this->gameunitUnitTable = $sm->get('Gameunit\Model\GameunitUnitTable');
        }

        return $this->gameunitUnitTable;
    }
}
