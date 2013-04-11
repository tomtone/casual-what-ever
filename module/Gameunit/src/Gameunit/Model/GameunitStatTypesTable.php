<?php
/**
 * @author Marco Bunge
 * @copyright 2012 Marco Bunge <efika@rubymatrix.de>
 */

namespace Gameunit\Model;


use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Predicate\PredicateSet;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;
use Zend\Db\TableGateway\TableGateway;

/**
 * Class GameunitStatTypesTable
 * @package Gameunit\Model
 */
class GameunitStatTypesTable {

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
     * @param array $collection
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function fetchByIdCollection(array $collection)
    {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($collection){
            $condition = array();

            foreach($collection as $item){
                $item = (int) $item;
                $condition[] = 'id = ' . $item;
            }

            $select->where($condition,PredicateSet::OP_OR);
        });

        return $resultSet;
    }

}