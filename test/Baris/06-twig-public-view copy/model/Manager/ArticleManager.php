<?php

namespace model\Manager;

use model\Mapping\ArticleMapping;
use model\OurPDO;

use model\Interface\InterfaceManager;
use model\Interface\InterfaceSlugManager;

use model\Mapping\UserMapping;
use model\Mapping\CategoryMapping;
use model\Mapping\TagMapping;

/**
 * Class ArticleManager
 *
 * Cette classe permet de gérer les articles en base de données.
 * Elle implémente les méthodes de l'interface InterfaceManager
 * et InterfaceSlugManager.
 *
 */
class ArticleManager implements InterfaceManager, InterfaceSlugManager
{

    // Attributes
    private OurPDO $db; // contient la connexion à la base de données

    public function __construct(OurPDO $pdo)
    {
        // on stocke la connexion à la base de données
        // dans l'attribut privé $db
        $this->db = $pdo;
    }

    // simple selectAll sur la table article
    public function selectAll(): ?array
    {
        // on récupère tous les articles
        $query = $this->db->query("SELECT * FROM article");
        // si aucun article n'est trouvé, on retourne null
        if ($query->rowCount() == 0) return null;
        // on récupère les articles sous forme de tableau associatif
        $tabMapping = $query->fetchAll();
        // on ferme le curseur
        $query->closeCursor();
        // on crée le tableau où on va instancier les objets
        $tabObject = [];
        foreach ($tabMapping as $mapping) {
            $tabObject[] = new ArticleMapping($mapping);

        }
        return $tabObject;
    }

    public function selectAllArticleHomepage(): ?array
    {

        // on récupère tous les articles avec jointures
        $query = $this->db->query("
        SELECT a.`article_id`, a.`article_title`, 
               SUBSTRING_INDEX(a.`article_text`,' ', 30) as `article_text`,
               a.`article_slug`, a.`article_date_publish`, 
               u.`user_id`, u.`user_login`, u.`user_full_name`,
               GROUP_CONCAT(c.`category_id`) as`category_id`, 
               GROUP_CONCAT(c.`category_name` SEPARATOR '|||') as `category_name`, 
               GROUP_CONCAT(c.`category_slug` SEPARATOR '|||') as `category_slug`,
               (SELECT COUNT(*)
                    FROM `comment` c
                    WHERE a.`article_id` = c.`article_article_id`)
                   as `comment_count`
        FROM `article` a
        INNER JOIN `user` u  
            ON u.`user_id` = a.`user_user_id`
        LEFT JOIN article_has_category ahc
            ON ahc.`article_article_id` = a.`article_id`
        LEFT JOIN category c
            ON c.`category_id` = ahc.`category_category_id`
        WHERE a.`article_is_published` = 1
            GROUP BY a.`article_id`
            ORDER BY a.`article_date_publish` DESC
        
        ");
        // si aucun article n'est trouvé, on retourne null
        if ($query->rowCount() == 0) return null;
        // on récupère les articles sous forme de tableau associatif
        $tabMapping = $query->fetchAll();
        // on ferme le curseur
        $query->closeCursor();
        // on crée le tableau où on va instancier les objets
        $tabObject = [];
        // pour chaque article, on boucle
        foreach ($tabMapping as $mapping) {
            // si on a un user on l'instancie
            $user = $mapping['user_login'] !== null ? new UserMapping($mapping) : null;
            // si on a des catégories
            if ($mapping['category_id'] !== null) {
                // on crée un tableau de catégories
                $tabCategories = [];
                // on récupère les catégories
                $tabCategoryIds = explode(",", $mapping['category_id']);
                $tabCategoryNames = explode("|||", $mapping['category_name']);
                $tabCategorySlugs = explode("|||", $mapping['category_slug']);
                // on boucle sur les catégories
                for ($i = 0; $i < count($tabCategoryIds); $i++) {
                    // on instancie la catégorie
                    $category = new CategoryMapping([
                        'category_id' => $tabCategoryIds[$i],
                        'category_name' => $tabCategoryNames[$i],
                        'category_slug' => $tabCategorySlugs[$i]
                    ]);
                    // on ajoute la catégorie au tableau
                    $tabCategories[] = $category;
                }

            } else {
                $tabCategories = null;
            }


            // on instancie l'article
            $article = new ArticleMapping($mapping);
            // on ajoute user à l'article
            $article->setUser($user);
            // on ajoute les catégories à l'article
            $article->setCategories($tabCategories);
            // on ajoute l'article au tableau
            $tabObject[] = $article;
        }
        return $tabObject;
    }

    public function selectAllArticleByCategorySlug(string $slug): ?array
    {

        // on récupère tous les articles avec jointures
        $prepare = $this->db->prepare("
        SELECT a.`article_id`, a.`article_title`, 
               SUBSTRING_INDEX(a.`article_text`,' ', 30) as `article_text`,
               a.`article_slug`, a.`article_date_publish`, 
               u.`user_id`, u.`user_login`, u.`user_full_name`,
               
               (SELECT COUNT(*)
                    FROM `comment` c
                    WHERE a.`article_id` = c.`article_article_id`)
                   as `comment_count`
        FROM `article` a
        INNER JOIN `user` u  
            ON u.`user_id` = a.`user_user_id`
        LEFT JOIN article_has_category ahc
            ON ahc.`article_article_id` = a.`article_id`
        LEFT JOIN category c
            ON c.`category_id` = ahc.`category_category_id`
        WHERE a.`article_is_published` = 1
        AND c.`category_slug` = :slug
            GROUP BY a.`article_id`
            ORDER BY a.`article_date_publish` DESC
        
        ");
        $prepare->execute(['slug' => $slug]);
        // si aucun article n'est trouvé, on retourne null
        if ($prepare->rowCount() == 0) return null;
        // on récupère les articles sous forme de tableau associatif
        $tabMapping = $prepare->fetchAll();
        // on ferme le curseur
        $prepare->closeCursor();
        // on crée le tableau où on va instancier les objets
        $tabObject = [];
        // pour chaque article, on boucle
        foreach ($tabMapping as $mapping) {
            // si on a un user on l'instancie
            $user = $mapping['user_login'] !== null ? new UserMapping($mapping) : null;

            // on instancie l'article
            $article = new ArticleMapping($mapping);
            // on ajoute user à l'article
            $article->setUser($user);
            // on ajoute l'article au tableau
            $tabObject[] = $article;
        }
        return $tabObject;
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

    public function selectOneBySlug(string $slug)
    {
        // on récupère tous les articles avec jointures
        $query = $this->db->prepare("
        SELECT a.*, 
               u.`user_id`, u.`user_login`, u.`user_full_name`,
               GROUP_CONCAT(c.`category_id`) as`category_id`, 
               GROUP_CONCAT(c.`category_name` SEPARATOR '|||') as `category_name`, 
               GROUP_CONCAT(c.`category_slug` SEPARATOR '|||') as `category_slug`,
               (SELECT GROUP_CONCAT(t.`tag_slug` SEPARATOR '|||')
                    FROM `tag` t
                    INNER JOIN `tag_has_article` tha
                        ON tha.`article_article_id` = a.`article_id`
                    WHERE t.`tag_id` = tha.`tag_tag_id`
                    GROUP BY a.`article_id`
                    ORDER BY t.`tag_slug` ASC    
                    ) as `tag_slug`
            

        FROM `article` a
        INNER JOIN `user` u  
            ON u.`user_id` = a.`user_user_id`
        LEFT JOIN article_has_category ahc
            ON ahc.`article_article_id` = a.`article_id`
        LEFT JOIN category c
            ON c.`category_id` = ahc.`category_category_id`
        WHERE a.`article_is_published` = 1
            AND a.`article_slug` = :slug
            GROUP BY a.`article_id`
        
        ");
        $query->execute(['slug' => $slug]);
        // si aucun article n'est trouvé, on retourne null
        if ($query->rowCount() == 0) return null;
        // on récupère les articles sous forme de tableau associatif
        $mapping = $query->fetch();
        // on ferme le curseur
        $query->closeCursor();

            // si on a un user on l'instancie
            $user = $mapping['user_login'] !== null ? new UserMapping($mapping) : null;
            // si on a des catégories
            if ($mapping['category_id'] !== null) {
                // on crée un tableau de catégories
                $tabCategories = [];
                // on récupère les catégories
                $tabCategoryIds = explode(",", $mapping['category_id']);
                $tabCategoryNames = explode("|||", $mapping['category_name']);
                $tabCategorySlugs = explode("|||", $mapping['category_slug']);
                // on boucle sur les catégories
                for ($i = 0; $i < count($tabCategoryIds); $i++) {
                    // on instancie la catégorie
                    $category = new CategoryMapping([
                        'category_id' => $tabCategoryIds[$i],
                        'category_name' => $tabCategoryNames[$i],
                        'category_slug' => $tabCategorySlugs[$i]
                    ]);
                    // on ajoute la catégorie au tableau
                    $tabCategories[] = $category;
                }

            } else {
                $tabCategories = null;
            }
            // si on a des tags
            if ($mapping['tag_slug'] !== null) {
                // on crée un tableau de tags
                $tabTags = [];
                // on récupère les tags
                $tabTagSlugs = explode("|||", $mapping['tag_slug']);
                // on boucle sur les tags
                for ($i = 0; $i < count($tabTagSlugs); $i++) {
                    // on instancie le tag
                    $tag = new TagMapping([
                        'tag_slug' => $tabTagSlugs[$i]
                    ]);
                    // on ajoute le tag au tableau
                    $tabTags[] = $tag;
                }
            } else {
                $tabTags = null;
            }


            // on instancie l'article
            $article = new ArticleMapping($mapping);
            // on ajoute user à l'article
            $article->setUser($user);
            // on ajoute les catégories à l'article
            $article->setCategories($tabCategories);
            // on ajoute les tags à l'article
            $article->setTags($tabTags);
            // on retourne l'article

        return $article;
    }
}