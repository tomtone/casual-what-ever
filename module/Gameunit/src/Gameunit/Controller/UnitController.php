<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Gameunit\Controller;

use Gameunit\Model\GameunitUnitTable;
use Zend\View\Model\ViewModel;

class UnitController extends AbstractGameunitActionController
{

    protected $type = GameunitUnitTable::TYPE_UNIT;

    public function indexAction()
    {
        $vm = new ViewModel();
        $vm->addChild($this->getUnitListView(),'linkList');
        return $vm;
    }

    public function detailAction()
    {
        $id = $this->params()->fromRoute('id',1);
        $this->getGameunitRepository();
        $items = $this->getGameunitRepository()->getUnitTable()->fetchById($id,$this->type);
        $vm = new ViewModel(array(
            'info' => $items,
            'stats' => 'list of stats'
        ));
        $vm->addChild($this->getUnitListView(),'linkList');
        return $vm;
    }
}
