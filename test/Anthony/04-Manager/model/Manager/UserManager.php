<?php

namespace model\Manager;

use Exception;
use model\Interface\InterfaceManager;
use model\Mapping\UserMapping;
use model\Abstract\AbstractMapping;
use model\Mapping\PermissionMapping;
use model\OurPDO;

class UserManager implements InterfaceManager
{

    // On va stocker la connexion dans une propriété privée
    private ?OurPDO $connect = null;

    // on va passer notre connexion OurPDO
    // à notre manager lors de son instanciation
    public function __construct(OurPDO $db)
    {
        $this->connect = $db;
    }

    // sélection de tous les users
    public function selectAll(): ?array
    {
        // requête SQL
        $sql = "SELECT * FROM `user` 
         ORDER BY `user_id` ASC";
        // query car pas d'entrées d'utilisateur
        $select = $this->connect->query($sql);

        // si on ne récupère rien, on quitte avec un message d'erreur
        if ($select->rowCount() === 0) return null;

        // on transforme nos résultats en tableau associatif
        $array = $select->fetchAll(OurPDO::FETCH_ASSOC);

        // on ferme le curseur
        $select->closeCursor();

        // on va stocker les users dans un tableau
        $arrayUser = [];

        /* pour chaque valeur, on va créer une instance de classe
        UserMapping, liée à la table qu'on va manager
        */
        foreach ($array as $value) {
            // on remplit un nouveau tableau contenant les users
            $arrayUser[] = new UserMapping($value);
        }

        // on retourne le tableau
        return $arrayUser;
    }

    public function selectAllWithPermission()
    {
        $query = $this->connect->query("SELECT user.user_id, user.user_full_name, permission_permission_id, permission.permission_name,
        permission.permission_description
                FROM user
                LEFT JOIN permission
                ON permission_permission_id = permission.permission_id");

        // si aucun article n'est trouvé, on retourne null
        if ($query->rowCount() == 0) return null;
        // on récupère les articles sous forme de tableau associatif
        $tabMapping = $query->fetchAll();
        // on ferme le curseur
        $query->closeCursor();
        // on crée le tableau où on va instancier les objets
        $tabObject = [];

        //Pour chaque utilisateur, on boucle
        foreach ($tabMapping as $mapping) {
            // Si on a une permission, on l'instancie
            $permission = $mapping['permission_permission_id'] !== null ? new PermissionMapping([
                'permission_id' => $mapping['permission_permission_id'],
                'permission_name' => $mapping['permission_name'],
                'permission_description' => $mapping['permission_description']
            ]) : null;

            // on instancie l'utilisateur
            $user = new UserMapping([
                'user_id' => $mapping['user_id'],
                'user_full_name' => $mapping['user_full_name'],
                'permission_permission_id' => $mapping['permission_permission_id']
            ]);

            // On ajoute la permission à l'utilisateur
            $user->setPermission($permission);

            // on ajoute l'utilisateur au tableau

            $tabObject[] = $user;
        }
        return $tabObject;
    }

    // récupération d'un user via son id
    public function selectOneById(int $id): null|string|UserMapping
    {

        // requête préparée
        $sql = "SELECT * FROM `user` WHERE `user_id`= ?";
        $prepare = $this->connect->prepare($sql);

        try {
            $prepare->bindValue(1, $id, OurPDO::PARAM_INT);
            $prepare->execute();

            // pas de résultat = null
            if ($prepare->rowCount() === 0) return null;

            // récupération des valeurs en tableau associatif
            $result = $prepare->fetch(OurPDO::FETCH_ASSOC);

            // création de l'instance UserMapping
            $result = new UserMapping($result);

            $prepare->closeCursor();

            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // mise à jour d'un user
    public function update(AbstractMapping $mapping): bool|string
    {

        // requête préparée
        $sql = "UPDATE `user` SET  `user_login`=?,`user_password`=?,
                `user_full_name`=?,`user_mail`=?,`user_status`=?,`user_secret_key`=?,
                `permission_permission_id`=?  WHERE `user_id`=?";


        $prepare = $this->connect->prepare($sql);

        try {
            $prepare->bindValue(1, $mapping->getUserLogin());
            $prepare->bindValue(2, $mapping->getUserPassword());
            $prepare->bindValue(3, $mapping->getUserFullName());
            $prepare->bindValue(4, $mapping->getUserMail());
            $prepare->bindValue(5, $mapping->getUserStatus());
            $prepare->bindValue(6, $mapping->getUserSecretKey());
            $prepare->bindValue(7, $mapping->getPermissionPermissionId(), OurPDO::PARAM_INT);
            $prepare->bindValue(8, $mapping->getUserId(), OurPDO::PARAM_INT);

            $prepare->execute();

            $prepare->closeCursor();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    // insertion d'un user
    public function insert(AbstractMapping $mapping): bool|string
    {

        // requête préparée
        $sql = "INSERT INTO `user`(`user_id`, `user_login`, `user_password`, `user_full_name`, `user_mail`, `user_status`,
         `user_secret_key`, `permission_permission_id`)   VALUES (?,?,?,?,?,?,?,?)";
        $prepare = $this->connect->prepare($sql);

        try {
            $prepare->bindValue(1, $mapping->getUserId(), OurPDO::PARAM_INT);
            $prepare->bindValue(2, $mapping->getUserLogin());
            $prepare->bindValue(3, $mapping->getUserPassword());
            $prepare->bindValue(4, $mapping->getUserFullName());
            $prepare->bindValue(5, $mapping->getUserMail());
            $prepare->bindValue(6, $mapping->getUserStatus());
            $prepare->bindValue(7, $mapping->getUserSecretKey());
            $prepare->bindValue(8, $mapping->getPermissionPermissionId(), OurPDO::PARAM_INT);


            $prepare->execute();

            $prepare->closeCursor();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // suppression d'un user
    public function delete(int $id): bool|string
    {
        // requête préparée
        $sql = "DELETE FROM `user` WHERE `user_id`=?";
        $prepare = $this->connect->prepare($sql);

        try {
            $prepare->bindValue(1, $id, OurPDO::PARAM_INT);

            $prepare->execute();

            $prepare->closeCursor();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
