<?php
/**
 * @author Marco Bunge
 * @copyright 2012 Marco Bunge <efika@rubymatrix.de>
 */

namespace Gameunit\Model;


/**
 * Class DefaultUnit
 * @package Unit\Model
 */
trait BaseUnitTrait
{

    /**
     * @var int
     */
    public $id = 0;
    /**
     * @var null
     */
    public $name = null;
    /**
     * @var null
     */
    public $desc = null;

    /**
     * @var int
     */
    public $currentExp = 0;
    /**
     * @var int
     */
    public $expUpgradeFactor = 64;
    /**
     * @var int
     */
    public $defUpgradeFactor = 2;
    /**
     * @var int
     */
    public $offUpgradeFactor = 2;
    /**
     * @var int
     */
    public $costUpgradeFactor = 2;

    /**
     * List of abilities
     * @var array
     */
    public $abilities = null;

    /**
     * @param int $upgrade Amount upgrade value
     * @param bool $nextLevel When true points of next level will be calculated
     * @return float calculated value
     */
    public function calculatePoints($upgrade, $nextLevel = false)
    {
        $level = $this->calculateLevel();
        if ($nextLevel) {
            $level++;
        }
        return $level * $upgrade;
    }

    /**
     * Calculate unit level
     * @return float
     */
    public function calculateLevel()
    {
        return $this->getCurrentExp() / $this->getExpUpgradeFactor();
    }

    /**
     * @return int
     */
    public function getCurrentExp()
    {
        return $this->currentExp;
    }

    /**
     * @param int $currentExp
     */
    public function setCurrentExp($currentExp)
    {
        $this->currentExp = $currentExp;
    }

    /**
     * @return int
     */
    public function getExpUpgradeFactor()
    {
        return $this->expUpgradeFactor;
    }

    /**
     * @param int $expUpgradeFactor
     */
    public function setExpUpgradeFactor($expUpgradeFactor)
    {
        $this->expUpgradeFactor = $expUpgradeFactor;
    }

    /**
     * @return int
     */
    public function getDefUpgradeFactor()
    {
        return $this->defUpgradeFactor;
    }

    /**
     * @param int $defUpgradeFactor
     */
    public function setDefUpgradeFactor($defUpgradeFactor)
    {
        $this->defUpgradeFactor = $defUpgradeFactor;
    }

    /**
     * @return int
     */
    public function getOffUpgradeFactor()
    {
        return $this->offUpgradeFactor;
    }

    /**
     * @param int $offUpgradeFactor
     */
    public function setOffUpgradeFactor($offUpgradeFactor)
    {
        $this->offUpgradeFactor = $offUpgradeFactor;
    }

    /**
     * @return int
     */
    public function getCostUpgradeFactor()
    {
        return $this->costUpgradeFactor;
    }

    /**
     * @param int $costUpgradeFactor
     */
    public function setCostUpgradeFactor($costUpgradeFactor)
    {
        $this->costUpgradeFactor = $costUpgradeFactor;
    }

    /**
     * @return null
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
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