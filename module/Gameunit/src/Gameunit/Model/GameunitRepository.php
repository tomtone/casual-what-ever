<?php
/**
 * @author Marco Bunge
 * @copyright 2012 Marco Bunge <efika@rubymatrix.de>
 */

namespace Gameunit\Model;


class GameunitRepository {
    protected $unitTable;
    protected $statsTable;

    public function getUnitTable()
    {
        return $this->unitTable;
    }

    public function setUnitTable(GameunitUnit $unitTable)
    {
        $this->unitTable = $unitTable;
    }

    public function getStatsTable()
    {
        return $this->statsTable;
    }

    public function setStatsTable($statsTable)
    {
        $this->statsTable = $statsTable;
    }
}