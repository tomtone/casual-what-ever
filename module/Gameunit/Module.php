<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Gameunit;

use Gameunit\Model\GameunitRepository;
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
        'gameunit_stats' => [
            'table' => 'Gameunit\Model\GameunitStatsTable',
            'storage' => 'Gameunit\Model\GameunitStats',
        ],
        'gameunit_stat_types' => [
            'table' => 'Gameunit\Model\GameunitStatTypesTable',
            'storage' => 'Gameunit\Model\GameunitStatTypes',
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
                    return $module->setupTable('gameunit_unit',$sm);
                },

                'Gameunit\Model\GameunitStatsTable' =>  function (ServiceManager $sm) use ($module) {
                    return $module->setupTable('gameunit_stats',$sm);
                },

                'Gameunit\Model\GameunitStatTypesTable' =>  function (ServiceManager $sm) use ($module) {
                    return $module->setupTable('gameunit_stat_types',$sm);
                },

                'Gameunit\Model\GameunitRepository' =>  function (ServiceManager $sm) use ($module) {
                    $repository = new GameunitRepository();
                    $repository->setStatsTable($sm->get('Gameunit\Model\GameunitStatsTable'));
                    $repository->setUnitTable($sm->get('Gameunit\Model\GameunitUnitTable'));
                    $repository->setStatTypesTable($sm->get('Gameunit\Model\GameunitStatTypesTable'));
                    return $repository;
                },
            ),
        );
    }

}
