<?php

namespace model\Trait;

use Exception;


trait TraitRunQuery
{

    protected function runQuery ($sql) : array|null {

        $select = $this->connect->query($sql);
        if($select->rowCount()===0) return null;
        $array = $select->fetchAll();
        $select->closeCursor();

        return $array;
    }

}