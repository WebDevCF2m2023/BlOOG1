<?php

namespace model\Manager;

use model\Abstract\AbstractMapping;
use model\Interface\InterfaceManager;
use model\OurPDO;

use model\Mapping\TagMapping;
use PDO;

class TagManager implements InterfaceManager {

    private OurPDO $db; // pourquoi est ce __contstuctor repeter dans les Manager (comme obligé par InterManager)? Voyant que toutes les Class ont besoin, seras mieux dans AbstractMapping, non?
    public function __construct(OurPDO $pdo)
    {
        $this->db = $pdo;
    }

    public function selectAll($limit=999)
    {
        $query = $this->db->query("SELECT * FROM (
                                         SELECT * 
                                         FROM tag
                                         ) AS tagSelect
                                         ORDER BY RAND()
                                         LIMIT $limit");
        if ($query->rowCount() == 0) return null;
        $tagMapping = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        $tagObject = [];
        foreach ($tagMapping as $mapping) {
            $tagObject[] = new TagMapping($mapping);
        }
        return $tagObject;
    }


    public function selectOneById(int $id)
    {
        // TODO: Implement selectOneById() method.
    }

    public function insert(AbstractMapping $mapping)
    {
        // TODO: Implement insert() method.
    }

    public function update(AbstractMapping $mapping)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}