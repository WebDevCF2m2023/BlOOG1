<?php

namespace model\Manager ;

use Exception;
use model\Interface\InterfaceManager;
use model\Mapping\CommentMapping;
use model\Mapping\ImageMapping;
use model\Abstract\AbstractMapping;
use model\OurPDO;

class ImageManager implements InterfaceManager{

    // On va stocker la connexion dans une propriété privée
    private ?OurPDO $connect = null;

    // on va passer notre connexion OurPDO
    // à notre manager lors de son instanciation
    public function __construct(OurPDO $db){
        $this->connect = $db;
    }

    // sélection de toutes les images
    public function selectAll(): ?array
    {
        // requête SQL
        $sql = "SELECT * FROM `image` -- WHERE `comment_id`=999
         ORDER BY `image_id` DESC";
        // query car pas d'entrées d'utilisateur
        $select = $this->connect->query($sql);

        // si on ne récupère rien, on quitte avec un message d'erreur
        if($select->rowCount()===0) return null;

        // on transforme nos résultats en tableau associatif
        $array = $select->fetchAll(OurPDO::FETCH_ASSOC);

        // on ferme le curseur
        $select->closeCursor();

        // on va stocker les images dans un tableau
        $arrayImage = [];

        /* pour chaque valeur, on va créer une instance de classe
        ImageMapping, liée à la table qu'on va manager
        */
        foreach($array as $value){
            // on remplit un nouveau tableau contenant les images
            $arrayImage[] = new ImageMapping($value);
        }

        // on retourne le tableau
        return $arrayImage;
    }

    // récupération de l'image via son id
    public function selectOneById(int $id): null|string|ImageMapping
    {

        // requête préparée
        $sql = "SELECT * FROM `image` WHERE `image_id`= ?";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$id, OurPDO::PARAM_INT);
            $prepare->execute();

            // pas de résultat = null
            if($prepare->rowCount()===0) return null;

            // récupération des valeurs en tableau associatif
            $result = $prepare->fetch(OurPDO::FETCH_ASSOC);

            // création de l'instance ImageMapping
            $result = new ImageMapping($result);

            $prepare->closeCursor();
            
            return $result;


        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    // mise à jour d'une image
    public function update(AbstractMapping $mapping): bool|string
    {
        // requête préparée
        $sql = "UPDATE `image` SET `image_url`=?, `image_description`=?, `image_type`=?  WHERE `image_id`=?";
        $prepare = $this->connect->prepare($sql);
        
        try{
            $prepare->bindValue(1,$mapping->getImageUrlName());
            $prepare->bindValue(2,$mapping->getImageDescription());
            $prepare->bindValue(3,$mapping->getImageType());
            $prepare->bindValue(4,$mapping->getImageId(), OurPDO::PARAM_INT);

            
            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }


    // insertion d'une image
    public function insert(AbstractMapping $mapping): bool|string
    {

        // requête préparée
        $sql = "INSERT INTO `image`(`image_url`,`image_description`,`image_type`)  VALUES (?,?,?)";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$mapping->getImageUrlName());
            $prepare->bindValue(2,$mapping->getImageDescription());
            $prepare->bindValue(3,$mapping->getImageType());
            

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    // suppression d'une image 
    public function delete(int $id): bool|string
    {
        // requête préparée
        $sql = "DELETE FROM `image` WHERE `image_id`=?";
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

}