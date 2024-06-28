<?php

namespace model\Manager ;

use Exception;
use model\Interface\InterfaceManager;
use model\Mapping\TagMapping;
use model\Abstract\AbstractMapping;
use model\OurPDO;

class TagManager implements InterfaceManager{

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
        $sql = "SELECT * FROM `tag`
         ORDER BY `tag_id` DESC";
        // query car pas d'entrées d'utilisateur
        $select = $this->connect->query($sql);

        // si on ne récupère rien, on quitte avec un message d'erreur
        if($select->rowCount()===0) return null;

        // on transforme nos résultats en tableau associatif
        $array = $select->fetchAll(OurPDO::FETCH_ASSOC);

        // on ferme le curseur
        $select->closeCursor();

        // on va stocker les commentaires dans un tableau
        $arrayTag = [];

        /* pour chaque valeur, on va créer une instance de classe
        CommentMapping, liée à la table qu'on va manager
        */
        foreach($array as $value){
            // on remplit un nouveau tableau contenant les commentaires
            $arrayTag[] = new TagMapping($value);
        }

        // on retourne le tableau
        return $arrayTag;
    }

    public function selectOneByIdWithArticles(int $id): ?array
    {
        // requête SQL
        $sql = "SELECT t.*,
        
         FROM `tag` t
        -- LEFT JOIN ``
        -- LEFT JOIN 
         ORDER BY t.`tag_id` DESC";

         return [];

    }

    // récupération d'un tag via son id
    public function selectOneById(int $id): null|string|TagMapping
    {

        // requête préparée
        $sql = "SELECT * FROM `tag` WHERE `tag_id`= ?";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$id, OurPDO::PARAM_INT);
            $prepare->execute();

            // pas de résultat = null
            if($prepare->rowCount()===0) return null;

            // récupération des valeurs en tableau associatif
            $result = $prepare->fetch(OurPDO::FETCH_ASSOC);

            // création de l'instance CommentMapping
            $result = new TagMapping($result);

            $prepare->closeCursor();
            
            return $result;


        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }


    // insertion d'un tag
    public function insert(AbstractMapping $mapping): bool|string
    {

        // requête préparée
        $sql = "INSERT INTO `tag`(`tag_slug`)  VALUES (?)";
        $prepare = $this->connect->prepare($sql);

        try{
         $prepare->bindValue(1,$mapping->getTagSlug());
           // $prepare->bindValue(2,1, OurPDO::PARAM_INT);
            //$prepare->bindValue(3,1, OurPDO::PARAM_INT);

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    // suppression d'un tag
    public function delete(int $id): bool|string
    {
        // requête préparée
        $sql = "DELETE FROM `tag` WHERE `tag_id`=?";
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
    public function update(AbstractMapping $mapping): bool|string
    {

        // requête préparée
        $sql = "UPDATE `tag` SET `tag_slug`=? WHERE `tag_id`=?";
        // mise à jour de la date de modification
        
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$mapping->getTagSlug());
            $prepare->bindValue(2,$mapping->getTagId(), OurPDO::PARAM_INT);

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }
    

}