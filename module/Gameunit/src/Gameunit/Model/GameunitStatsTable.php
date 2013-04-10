<?php
/**
 * @author Marco Bunge
 * @copyright 2012 Marco Bunge <efika@rubymatrix.de>
 */

namespace Gameunit\Model;


use Zend\Db\TableGateway\TableGateway;

class GameunitStatsTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getStatsByUnitId($unit_id)
    {
        $unit_id  = (int) $unit_id;
        $rowset = $this->tableGateway->select(array('unit_id' => $unit_id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception(sprintf("Could not find row (unit_id) %d",$unit_id));
        }
        return $row;
    }

}