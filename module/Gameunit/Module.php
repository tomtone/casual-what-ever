<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Gameunit;

use Gameunit\Model\GameunitUnit;
use Gameunit\Model\GameunitUnitTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;

/**
 * Class Module
 * @package Gameunit
 */
class Module
{

    protected $tables = [
        'gameunit_unit' => [
            'table' => 'Gameunit\Model\GameunitUnitTable',
            'storage' => 'Gameunit\Model\GameunitUnit',
        ],
    ];

    protected $tableInstances;

    public function setupTable($tableName,ServiceManager $sm)
    {
        $tableConfig = $this->tables[$tableName];
        $table = $tableConfig['table'];
        $storage = $tableConfig['storage'];
        if(!array_key_exists($tableName,$this->tables)){
            throw new \Exception(sprintf('Table %s does not exists',$tableName));
        }

        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new $storage());
        $tableGateway = new TableGateway($tableName, $dbAdapter, null, $resultSetPrototype);
        $object = new $table($tableGateway);

        return $object;
    }

    /**
     * @param MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {
        $e->getApplication()->getServiceManager()->get('translator');
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * @return array
     */
    public function getServiceConfig()
    {
        $module = $this;
        return array(
            'factories' => array(
                'Gameunit\Model\GameunitUnitTable' =>  function (ServiceManager $sm) use ($module) {
//                    $tableGateway = $sm->get('GameunitUnitTableGateway');
//                    $table = new GameunitUnitTable($tableGateway);
//                    return $table;
                    return $module->setupTable('gameunit_unit',$sm);
                },

//                'GameunitUnitTableGateway' => function (ServiceManager $sm) use ($module) {
//                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
//                    $resultSetPrototype = new ResultSet();
//                    $resultSetPrototype->setArrayObjectPrototype(new GameunitUnit());
//                    return new TableGateway('gameunit_unit', $dbAdapter, null, $resultSetPrototype);
//                    return $module->setupTable('GameunitUnitTableGateway',$sm);
//                },
            ),
        );
    }

}
