<?php

namespace model\Manager;

use model\Mapping\ArticleMapping;
use model\OurPDO;

use model\Interface\InterfaceManager;
use model\Interface\InterfaceSlugManager;

use model\Mapping\UserMapping;

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
        if($query->rowCount()==0) return null;
        // on récupère les articles sous forme de tableau associatif
        $tabMapping = $query->fetchAll();
        // on ferme le curseur
        $query->closeCursor();
        // on crée le tableau où on va instancier les objets
        $tabObject = [];
        foreach($tabMapping as $mapping){
            $tabObject[] = new ArticleMapping($mapping);

        }
        return $tabObject;
    }
    public function selectAllArticleHomepage(): ?array
    {
        // on récupère tous les articles avec jointures
        $query = $this->db->query("
        SELECT a.*, 
               u.`user_id`, u.`user_login`, u.`user_full_name`,
               c.`category_id`, c.`category_name`, c.`category_slug`
        FROM `article` a
        INNER JOIN `user` u  
            ON u.`user_id` = a.`user_user_id`
        LEFT JOIN article_has_category ahc
            ON ahc.`article_article_id` = a.`article_id`
        LEFT JOIN category c
            ON c.`category_id` = ahc.`category_category_id`
        WHERE a.`article_is_published` = 1
        ORDER BY a.`article_date_publish` DESC
        
");
        // si aucun article n'est trouvé, on retourne null
        if($query->rowCount()==0) return null;
        // on récupère les articles sous forme de tableau associatif
        $tabMapping = $query->fetchAll();
        // on ferme le curseur
        $query->closeCursor();
        // on crée le tableau où on va instancier les objets
        $tabObject = [];
        foreach($tabMapping as $mapping){
            $user = new UserMapping($mapping);
            $article = new ArticleMapping($mapping);
            $article->setUser($user);
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
        // TODO: Implement selectOneBySlug() method.
    }
}