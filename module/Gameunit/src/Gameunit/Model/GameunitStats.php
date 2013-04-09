<?php
/**
 * @author Marco Bunge
 * @copyright 2012 Marco Bunge <efika@rubymatrix.de>
 */

namespace Gameunit\Model;


class GameunitStats {
    public $id;
    public $parentId;
    public $name;
    public $description;

    public function exchangeArray($data){
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->parentId = (isset($data['parentId'])) ? $data['parentId'] : null;
        $this->name  = (isset($data['name'])) ? $data['name'] : null;
        $this->description  = (isset($data['description'])) ? $data['description'] : null;
    }
}