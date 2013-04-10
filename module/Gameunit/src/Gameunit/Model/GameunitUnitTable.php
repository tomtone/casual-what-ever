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
 * Class GameunitUnitTable
 * @package Gameunit\Model
 */
class GameunitUnitTable
{

    /**
     *
     */
    const TYPE_UNIT = 1;
    /**
     *
     */
    const TYPE_BUILDING = 2;

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
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function fetchAll()
    {
        $resultSet = $this->getUnitResults();
        return $resultSet;
    }

    /**
     * @param $typeId
     * @return ResultSet
     * @throws \Exception
     */
    public function fetchByTypeId($typeId)
    {
        if (!is_numeric($typeId)) {
            throw new \Exception(sprintf("TypeId mus be integer. '%s' given", gettype($typeId)));
        }else{
            $typeId = (int) $typeId;
        }

        $condition = array($this->tableGateway->table . '.type_id' => $typeId);

        $resultSet = $this->getUnitResults($condition);

        return $resultSet;
    }

    /**
     * @param int $id
     * @param int|null $type_id
     * @throws \Exception
     * @return mixed
     */
    public function fetchById($id,$type_id=null)
    {
        if (!is_numeric($id)) {
            throw new \Exception(sprintf("Id must be integer. '%s' given"), gettype($id));
        }else{
            $id = (int) $id;
        }

        $condition = array($this->tableGateway->table . '.id' => $id);

        if($type_id !== null){
            if (!is_numeric($type_id)) {
                throw new \Exception(sprintf("TypeId must be integer. '%s' given"), gettype($type_id));
            }else{
                $type_id = (int) $type_id;
                $condition[$this->tableGateway->table . '.type_id'] = $type_id;
            }
        }

        $resultSet = $this->getUnitResults($condition);

        $row = $resultSet->current();
        if (!$row) {
            throw new \Exception(sprintf("Could not find row with id '%d'", $id));
        }
        return $row;
    }

    /**
     * @param $condition
     * @return ResultSet
     * @throws \Exception
     */
    protected function getUnitResults($condition = null)
    {
        $rowset = $this->tableGateway->select(function (Select $select) use ($condition) {
            $select->join(
                'gameunit_types',
                sprintf(
                    'gameunit_types.id = %s.type_id',
                    $this->tableGateway->table
                ),
                array('type_name' => 'name')
            );

            if ($condition !== null) {
                $select->where($condition);
            }
        });

        return $rowset;
    }

}