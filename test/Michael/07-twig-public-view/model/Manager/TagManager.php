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

    public function selectAll(): array
    {
        // TODO: Implement selectAll() method.
    }

    public function selectOneById(int $id): object
    {
        // TODO: Implement selectOneById() method.
    }

    public function insert(object $object): void
    {
        // TODO: Implement insert() method.
    }

    public function update(object $object): void
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
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