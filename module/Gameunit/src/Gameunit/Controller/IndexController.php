<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Gameunit\Controller;

use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 * @package Gameunit\Controller
 */
class IndexController extends AbstractGameunitActionController
{

    /**
     *
     */
    public function __construct()
    {
        // TODO: Implement __construct() method.
    }


    /**
     * @return ViewModel
     */
    public function indexAction()
    {
//        $child = new ViewModel();
//        $child->setTemplate('gameunit/unit/index');

        $units = $this->forward()->dispatch('gameunit/unit',array('action' => 'index'));
        $buildings = $this->forward()->dispatch('gameunit/building',array('action' => 'index'));
        $resources = $this->forward()->dispatch('gameunit/resource',array('action' => 'index'));

        $vm = new ViewModel();
        $vm->addChild($units,'units');
        $vm->addChild($buildings,'buildings');
        $vm->addChild($resources,'resources');
        return $vm;
    }

    /**
     * @return ViewModel
     */
    public function showAction()
    {
        return new ViewModel();
    }
}
