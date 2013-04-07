<?php
/**
 * @author Marco Bunge
 * @copyright 2012 Marco Bunge <efika@rubymatrix.de>
 */

namespace Unit\Model;


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
     * List of abilities
     * @var array
     */
    public $abilities = null;

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
     * @return array
     */
    public function getAbilities()
    {
        return $this->abilities;
    }

    /**
     * @param $abilities
     */
    public function setAbilities($abilities)
    {
        $this->abilities = $abilities;
    }
}