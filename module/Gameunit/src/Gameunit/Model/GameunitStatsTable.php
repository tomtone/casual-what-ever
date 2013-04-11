<?php
/**
 * @author Marco Bunge
 * @copyright 2012 Marco Bunge <efika@rubymatrix.de>
 */

namespace Gameunit\Model;


use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;

/**
 * Class GameunitStatsTable
 * @package Gameunit\Model
 */
class GameunitStatsTable {

    /**
     * @var \Zend\Db\TableGateway\TableGateway
     */
    protected $tableGateway;

    /**
     * @param TableGateway $tableGateway
     */
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    /**
     * @return ResultSet
     */
    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    /**
     * @param $unit_id
     * @return ResultSet
     */
    public function fetchByUnitId($unit_id)
    {
        $unit_id  = (int) $unit_id;
        $resultSet = $this->tableGateway->select(array('unit_id' => $unit_id));
        return $resultSet;
    }

}