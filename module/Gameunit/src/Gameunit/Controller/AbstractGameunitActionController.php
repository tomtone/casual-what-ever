<?php
/**
 * @author Marco Bunge
 * @copyright 2012 Marco Bunge <efika@rubymatrix.de>
 */

namespace Gameunit\Controller;

use Gameunit\Model\GameunitRepository;
use Zend\Db\ResultSet\ResultSet;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class AbstractGameunitActionController
 * @package Gameunit\Controller
 */
abstract class AbstractGameunitActionController extends AbstractActionController{

    /**
     * @var int
     */
    protected $type = 1;

    /**
     * @var
     */
    protected $gameunitRepository;

    /**
     * @return GameunitRepository
     */
    public function getGameunitRepository()
    {
        if (!$this->gameunitRepository) {
            $sm = $this->getServiceLocator();
            $this->gameunitRepository = $sm->get('Gameunit\Model\GameunitRepository');
        }

        return $this->gameunitRepository;
    }

    /**
     * @param string $controllerName
     * @return ViewModel
     */
    public function getUnitListView($controllerName){
        $this->getGameunitRepository();

        $items = $this->getGameunitRepository()->getUnitTable()->fetchByTypeId($this->type);

        $linkList = new ViewModel(
            array(
                'list' => $items,
                'controllerName' => $controllerName
            )
        );
        $linkList->setTemplate('gameunit/shared/unit-link-list');
        return $linkList;
    }

}