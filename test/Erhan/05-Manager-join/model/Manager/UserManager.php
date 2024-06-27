<?php

namespace model\Manager;

use model\Mapping\UserMapping;
use model\OurPDO;

use model\Interface\InterfaceManager;

use model\Mapping\PermissionMapping;


class UserManager implements InterfaceManager
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
        $query = $this->db->query("SELECT * FROM user");
        // si aucun article n'est trouvé, on retourne null
        if($query->rowCount()==0) return null;
        // on récupère les articles sous forme de tableau associatif
        $tabMapping = $query->fetchAll();
        // on ferme le curseur
        $query->closeCursor();
        // on crée le tableau où on va instancier les objets
        $tabObject = [];
        foreach($tabMapping as $mapping){
            $tabObject[] = new userMapping($mapping);

        }
        return $tabObject;
    }
    public function selectAllUserHomepage(): ?array
    {
        // on récupère tous les articles avec jointures
        $query = $this->db->query("        
            SELECT u.`user_id`, u.`user_full_name`, u.`user_login`, p.`permission_id`, p.`permission_description`, p.`permission_name` FROM `user` u JOIN `permission` p ON u.`permission_permission_id` = p.`permission_id`;        
");
        // si aucun article n'est trouvé, on retourne null
        if($query->rowCount()==0) return null;
        // on récupère les articles sous forme de tableau associatif
        $tabMapping = $query->fetchAll();
        // on ferme le curseur
        $query->closeCursor();
        // on crée le tableau où on va instancier les objets
        $tabObject = [];
        // pour chaque article, on boucle
        foreach($tabMapping as $mapping){
            // si on a un user on l'instancie
            $user = $mapping['user_login'] !== null ? new UserMapping($mapping) : null;
            
            
           
            // on instancie l'article
            $permission = new PermissionMapping($mapping);
            // on ajoute user à l'article
            $permission->setUser($user);
            
            $tabObject[] = $permission;
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