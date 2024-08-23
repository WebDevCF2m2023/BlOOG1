<?php

namespace model\Manager;

use model\Abstract\AbstractMapping;
use model\Interface\InterfaceManager;
use model\Interface\InterfaceSlugManager;
use model\OurPDO;

use model\Mapping\CategoryMapping;

class CategoryManager implements InterfaceManager, InterfaceSlugManager
{

    private OurPDO $pdo;
    public function __construct(OurPDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll(): ?array
    {
        $selectAll = $this->pdo->prepare("SELECT * FROM category");
        $selectAll->execute();
        if($selectAll->rowCount() === 0){
            return null;
        }
        $all = $selectAll->fetchAll();
        $selectAll->closeCursor();
        $tabObject = [];
        foreach ($all as $mapping) {
            $tabObject[] = new CategoryMapping($mapping);
        }
        return $tabObject;
    }

    public function selectOneById(int $id)
    {
        $selectOneById = $this->pdo->prepare("SELECT * FROM category WHERE category_id = :id");
        $selectOneById->execute(['id' => $id]);
        if($selectOneById->rowCount() === 0){
            return null;
        }
        $fetchOne = $selectOneById->fetch();
        return new CategoryMapping($fetchOne);
    }

    public function insert(AbstractMapping $mapping)
    {
        $insertCategory = $this->pdo->prepare("INSERT INTO category (category_name, `category_slug`, `category_description`, `category_parent`) VALUES (:category_name, :category_slug, :category_description, :category_parent)");
        $insertCategory->bindValue('category_name', $mapping->getCategoryName());
        $insertCategory->bindValue('category_slug', $mapping->getCategorySlug());
        $insertCategory->bindValue('category_description', $mapping->getCategoryDescription());
        $insertCategory->bindValue('category_parent', $mapping->getCategoryParent());
        $insertCategory->execute();


    }

    public function update(AbstractMapping $mapping)
    {
        $categoryId = $mapping->getCategoryId();
        $categoryName = $mapping->getCategoryName();
        $categorySlug = $mapping->getCategorySlug();
        $categoryDescription = $mapping->getCategoryDescription();
        $categoryParent = $mapping->getCategoryParent();

        $sql = "UPDATE category
                SET 
                    category_name = :category_name,
                    category_slug = :category_slug,
                    category_description = :category_description,
                    category_parent = :category_parent
                WHERE
                    category_id = :category_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':category_id', $categoryId, OurPDO::PARAM_INT);
        $stmt->bindParam(':category_name', $categoryName);
        $stmt->bindParam(':category_slug', $categorySlug); // Selon PHPStorm, inutile d'inclure  OurPDO::PARAM_STR  ici
        $stmt->bindParam(':category_description', $categoryDescription);
        $stmt->bindParam(':category_parent', $categoryParent, OurPDO::PARAM_INT);

        $stmt->execute();
    }

    public function delete(int $id)
    {
        $delete = $this->pdo->prepare("DELETE FROM category WHERE category_id = :id");
        $delete->bindValue(':id', $id, OurPDO::PARAM_INT);
        $delete->execute();
        if($delete->rowCount() === 0) return false;
        return true;
    }

    public function selectOneBySlug(string $slug)
    {
        $selectOneBySlug = $this->pdo->prepare("SELECT * FROM category WHERE category_slug = :slug");
        $selectOneBySlug->execute(['slug' => $slug]);
        if($selectOneBySlug->rowCount() === 0){
            return null;
        }
        $fetchOne = $selectOneBySlug->fetch();
        //var_dump($fetchOne);
        return new CategoryMapping($fetchOne);
    }

    public function removeCategoriesForUpdate(int $id) : bool
    {
        $deleteCategories = $this->pdo->prepare("DELETE FROM article_has_category 
                                                       WHERE article_article_id = :id");
        $deleteCategories->execute([':id' => $id]);
        if($deleteCategories->rowCount() === 0) die("problem cat");
        $deleteCategories->closeCursor();
        return true;
    }

    public function addCategoryToArticle(string $cat, int $id) : bool
    {
        $sql = $this->pdo->prepare("INSERT INTO `article_has_category`(`article_article_id`, `category_category_id`) VALUES (?,?)");
        $sql->execute([$id, $cat]);
        if($sql->rowCount() === 0) return false;
        return true;
    }
}