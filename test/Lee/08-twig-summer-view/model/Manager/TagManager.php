<?php

namespace model\Manager;

use model\Interface\InterfaceManager;
use model\Interface\InterfaceSlugManager;
use model\OurPDO;
use model\Mapping\TagMapping;

class TagManager implements InterfaceManager, InterfaceSlugManager
{

    private OurPDO $pdo;

    public function __construct(OurPDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll(): array|null
    {
        $selectAll = $this->pdo->prepare("SELECT * FROM tag");
        $selectAll->execute();
        if($selectAll->rowCount() === 0){
            return null;
        }
        $allTags = $selectAll->fetchAll();
        $selectAll->closeCursor();
        $tabObject = [];
        foreach ($allTags as $mapping) {
            $tabObject[] = new TagMapping($mapping);
        }
        return $tabObject;
    }

    public function selectOneById(int $id): object
    {
        // TODO: Implement selectOneById() method.
    }

    public function insert(object $object): void
    {
        $tagSlug = $object->getTagSlug();
        $sql = "INSERT INTO tag (tag_slug) VALUES ( :tagSlug)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":tagSlug", $tagSlug);
        $stmt->execute();


    }

    public function update(object $object): void
    {

        $tagId = $object->getTagId();
        $tagSlug = $object->getTagSlug();

        $sql = "UPDATE tag
                SET tag_slug = :tag_slug
                WHERE tag_id = :tag_id";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':tag_id', $tagId, OurPDO::PARAM_INT);
        $statement->bindParam(':tag_slug', $tagSlug);

        $statement->execute();
    }

    public function delete(int $id): bool
    {
        $delete = $this->pdo->prepare("DELETE FROM tag WHERE tag_id = :id");
        $delete->bindValue(':id', $id, OurPDO::PARAM_INT);
        $delete->execute();
        if($delete->rowCount() === 0) return false;
        return true;
    }

    public function selectOneBySlug(string $slug): ?TagMapping
    {
        $prepare = $this->pdo->prepare("SELECT t.*, COUNT(tha.`tag_tag_id`) AS count_tag FROM `tag` t 
           LEFT JOIN `tag_has_article` tha on t.`tag_id` = tha.`tag_tag_id`
           WHERE `tag_slug` = :slug");
        $prepare->execute([':slug' => $slug]);
        if($prepare->rowCount() === 0) return null;
        return new TagMapping($prepare->fetch());
    }
}