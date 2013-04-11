<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Gameunit\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ResourceController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function showAction()
    {
        echo '<table>';
        foreach($this->getModuleManager()->getLoadedModules() as $name => $module){
            echo '<tr>';
            echo '<th>';
            echo $name;
            echo '</th>';
            echo '<td>';
            var_dump(get_class_methods($module));
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
        return $this->getResponse();
    }


    /**
     * @return \Zend\ModuleManager\ModuleManager
     */
    public function getModuleManager(){
       return $this->getServiceLocator()->get('Zend\ModuleManager\ModuleManager');
    }
}
