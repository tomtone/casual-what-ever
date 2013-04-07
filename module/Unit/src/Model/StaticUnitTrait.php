<?php
/**
 * @author Marco Bunge
 * @copyright 2012 Marco Bunge <efika@rubymatrix.de>
 */

namespace Unit\Model;


/**
 * Class StaticUnitTrait
 * @package Unit\Model
 */
trait StaticUnitTrait {
    /**
     * @var int
     */
    public $posX = 0;
    /**
     * @var int
     */
    public $posY = 0;
    /**
     * @var int
     */
    public $posZ = 0;

    /**
     * @return int
     */
    public function getPosX()
    {
        return $this->posX;
    }

    /**
     * @param $posX
     */
    public function setPosX($posX)
    {
        $this->posX = $posX;
    }

    /**
     * @return int
     */
    public function getPosY()
    {
        return $this->posY;
    }

    /**
     * @param $posY
     */
    public function setPosY($posY)
    {
        $this->posY = $posY;
    }

    /**
     * @return int
     */
    public function getPosZ()
    {
        return $this->posZ;
    }

    /**
     * @param $posZ
     */
    public function setPosZ($posZ)
    {
        $this->posZ = $posZ;
    }

}