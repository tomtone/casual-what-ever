<?php
/**
 * @author Marco Bunge
 * @copyright 2012 Marco Bunge <efika@rubymatrix.de>
 */

namespace Unit\Model;


/**
 * Class MovableUnitTrait
 * represents each movable unit like soldiers
 * @package Unit\Model
 */
/**
 * Class MovableUnitTrait
 * @package Unit\Model
 */
trait MovableUnitTrait {
    /**
     * @var int
     */
    public $dexUpgradeFactor = 2;

    /**
     * @var int
     */
    public $movementUpgradeFactor = 2;

    /**
     * @return int
     */
    public function getDexUpgradeFactor()
    {
        return $this->dexUpgradeFactor;
    }

    /**
     * @param $dexUpgradeFactor
     */
    public function setDexUpgradeFactor($dexUpgradeFactor)
    {
        $this->dexUpgradeFactor = $dexUpgradeFactor;
    }

    /**
     * @return int
     */
    public function getMovementUpgradeFactor()
    {
        return $this->movementUpgradeFactor;
    }

    /**
     * @param $movementUpgradeFactor
     */
    public function setMovementUpgradeFactor($movementUpgradeFactor)
    {
        $this->movementUpgradeFactor = $movementUpgradeFactor;
    }
}