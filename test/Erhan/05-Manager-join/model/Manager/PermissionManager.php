<?php

namespace model\Manager;

use Exception;
use model\Interface\InterfaceManager;
use model\Mapping\PermissionMapping;
use model\Abstract\AbstractMapping;
use model\Mapping\UserMapping;



use model\OurPDO;

class PermissionManager implements InterfaceManager{

    // On va stocker la connexion dans une propriété privée
    private ?OurPDO $connect = null;

    // on va passer notre connexion OurPDO
    // à notre manager lors de son instanciation
    public function __construct(OurPDO $db){
        $this->connect = $db;
    }

    // sélection de tous les articles
    public function selectAll(): ?array
    {
        // requête SQL
        $sql = "SELECT * FROM `permission` -- WHERE `comment_id`=999
         ORDER BY `permission_id` ASC";
        // query car pas d'entrées d'utilisateur
        $select = $this->connect->query($sql);

        // si on ne récupère rien, on quitte avec un message d'erreur
        if($select->rowCount()===0) return null;

        // on transforme nos résultats en tableau associatif
        $array = $select->fetchAll(OurPDO::FETCH_ASSOC);

        // on ferme le curseur
        $select->closeCursor();

        // on va stocker les permissions dans un tableau
        $arrayPermission = [];

        /* pour chaque valeur, on va créer une instance de classe
        PermissionMapping, liée à la table qu'on va manager
        */
        foreach($array as $value){
            // on remplit un nouveau tableau contenant les commentaires
            $arrayPermission[] = new PermissionMapping($value);
        }

        // on retourne le tableau
        return $arrayPermission;
    }

    // récupération d'un permission via son id
    public function selectOneById(int $id): null|string|PermissionMapping
    {

        // requête préparée
        $sql = "SELECT * FROM `permission` WHERE `permission_id`= ?";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$id, OurPDO::PARAM_INT);
            $prepare->execute();

            // pas de résultat = null
            if($prepare->rowCount()===0) return null;

            // récupération des valeurs en tableau associatif
            $result = $prepare->fetch(OurPDO::FETCH_ASSOC);

            // création de l'instance PermissionMapping
            $result = new PermissionMapping($result);

            $prepare->closeCursor();
            
            return $result;


        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    // mise à jour d'un permission
    public function update(AbstractMapping $mapping): bool|string
    {

        // requête préparée
        $sql = "UPDATE `permission` SET `permission_name`=?, `permission_description`=? WHERE `permission_id`=?";
        
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$mapping->getPermissionName());
            $prepare->bindValue(2,$mapping->getPermissionDescription());
            $prepare->bindValue(3,$mapping->getPermissionId(), OurPDO::PARAM_INT);

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }


    // insertion d'un permission
    public function insert(AbstractMapping $mapping): bool|string
    {

        // requête préparée
        $sql = "INSERT INTO `permission`(`permission_name`,`permission_description`)  VALUES (?,?)";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$mapping->getPermissionName());
            $prepare->bindValue(2,$mapping->getPermissionDescription());

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    // suppression d'un permission
    public function delete(int $id): bool|string
    {
        // requête préparée
        $sql = "DELETE FROM `permission` WHERE `permission_id`=?";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$id, OurPDO::PARAM_INT);

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    public function selectAllWithUsers(): ?array
    {
        // on récupère tous les articles avec jointures
        $query = $this->connect->query("        
            SELECT p.*,
            GROUP_CONCAT(u.`user_id`) as user_id,
            GROUP_CONCAT(u.`user_full_name` SEPARATOR '|||') as  user_full_name,
            GROUP_CONCAT(u.`user_login` SEPARATOR '|||') as user_login
            FROM `permission` p 
            LEFT JOIN `user` u 
            ON p.`permission_id` = u.`permission_permission_id`
            GROUP BY p.`permission_id`;        
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
            if(is_null($mapping['user_login'])){
                $users = null;
            }
            else
            {
                $users= [];

                $usersId = explode(",",$mapping['user_id']);
                $usersLogin = explode("|||",$mapping['user_login']);
                $usersFullName = explode("|||",$mapping['user_full_name']);

                for($i=0;$i<count($usersId);$i++)
                {
                    $user = new UserMapping([
                        'user_id'=> $usersId[$i],
                        'user_login'=> $usersLogin[$i],
                        'user_full_name'=> $usersFullName[$i],
                    ]);

                    $users[]=$user;
                }
            
            $permission = new PermissionMapping($mapping);
            // on ajoute user à la permission
            $permission->setUser($users);
            
            $tabObject[] = $permission;
            }           
        }           
        return $tabObject;
    }

}