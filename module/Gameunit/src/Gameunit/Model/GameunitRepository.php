<?php
/**
 * @author Marco Bunge
 * @copyright 2012 Marco Bunge <efika@rubymatrix.de>
 */

namespace Gameunit\Model;


/**
 * Class GameunitRepository
 * @package Gameunit\Model
 */
class GameunitRepository {
    /**
     * @var GameunitUnitTable
     */
    protected $unitTable;
    /**
     * @var GameunitStatsTable
     */
    protected $statsTable;

    /**
     * @var GameunitStatTypesTable
     */
    protected $statTypesTable;

    /**
     * @return GameunitUnitTable
     */
    public function getUnitTable()
    {
        return $this->unitTable;
    }

    /**
     * @param GameunitUnitTable $unitTable
     */
    public function setUnitTable(GameunitUnitTable $unitTable)
    {
        $this->unitTable = $unitTable;
    }

    /**
     * @return GameunitStatsTable
     */
    public function getStatsTable()
    {
        return $this->statsTable;
    }

    /**
     * @param GameunitStatsTable $statsTable
     */
    public function setStatsTable(GameunitStatsTable $statsTable)
    {
        $this->statsTable = $statsTable;
    }

    /**
     * @return GameunitStatTypesTable
     */
    public function getStatTypesTable()
    {
        return $this->statTypesTable;
    }

    /**
     * @param GameunitStatTypesTable $statTypesTable
     */
    public function setStatTypesTable(GameunitStatTypesTable $statTypesTable)
    {
        $this->statTypesTable = $statTypesTable;
    }
}