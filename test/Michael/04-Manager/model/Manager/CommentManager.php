<?php

namespace model\Manager ;

use Exception;
use model\Interface\InterfaceManager;
use model\Mapping\CommentMapping;
use model\OurPDO;

class CommentManager implements InterfaceManager{

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
        $sql = "SELECT * FROM `comment` -- WHERE `comment_id`=5
         ORDER BY `comment_date_publish` DESC";
        // query car pas d'entrées d'utilisateur
        $select = $this->connect->query($sql);

        // si on ne récupère rien, on quitte avec un message d'erreur
        if($select->rowCount()===0) return null;

        // on transforme nos résultats en tableau associatif
        $array = $select->fetchAll(OurPDO::FETCH_ASSOC);

        // pour chaque valeur, on va créer une instance de classe
        // liée à la table qu'on va manager
        foreach($array as $value){
            // on remplit un nouveau tableau contenant les commentaires
            $arrayComment[] = new CommentMapping($value);
        }

        return $arrayComment;
    }

    // récupération d'un commentaire via son id
    public function selectOneById(int $id): null|string|CommentMapping
    {

        // requête préparée
        $sql = "SELECT * FROM `comment` WHERE `comment_id`= ?";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$id, OurPDO::PARAM_INT);
            $prepare->execute();

            // pas de résultat = null
            if($prepare->rowCount()===0) return null;

            // récupération des valeurs en tableau associatif
            $result = $prepare->fetch(OurPDO::FETCH_ASSOC);

            // création de l'instance CommentMapping
            $result = new CommentMapping($result);

            $prepare->closeCursor();
            
            return $result;


        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }
    public function update(object $object)
    {
        // on récupère les valeurs de l'objet
        $commentId = $object->getCommentId();
        $commentText = $object->getCommentText();
        $commentParent = $object->getCommentParent();
        $commentDateCreate = $object->getCommentDateCreate();
        $commentDateUpdate = $object->getCommentDateUpdate();
        $commentDatePublish = $object->getCommentDatePublish();
        $commentIsPublished = $object->getCommentIsPublished();

        // requête préparée
        $sql = "UPDATE `comment` SET `comment_text`=?, `comment_parent`=?,`comment_date_create`=?, `comment_date_update`=?, `comment_date_publish`=?, `comment_is_published`=? WHERE `comment_id`=?";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$commentText, OurPDO::PARAM_STR);
            $prepare->bindValue(2,$commentParent, OurPDO::PARAM_INT);
            $prepare->bindValue(3,$commentDateCreate, OurPDO::PARAM_STR);
            $prepare->bindValue(4,$commentDateUpdate, OurPDO::PARAM_STR);
            $prepare->bindValue(5,$commentDatePublish, OurPDO::PARAM_STR);
            $prepare->bindValue(6,$commentIsPublished, OurPDO::PARAM_INT);
            $prepare->bindValue(7,$commentId, OurPDO::PARAM_INT);

            $prepare->execute();

            $prepare->closeCursor();

            return "Commentaire mis à jour";

        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }
    public function insert(object $object)
    {
        // on récupère les valeurs de l'objet
        $commentText = $object->getCommentText();
        $commentParent = $object->getCommentParent();

        $commentDateUpdate = $object->getCommentDateUpdate();
        $commentDatePublish = $object->getCommentDatePublish();
        $commentIsPublished = 0;

        // requête préparée
        $sql = "INSERT INTO `comment`(`comment_text`, `comment_parent`,  `comment_date_update`, `comment_date_publish`) 
        VALUES (?,?,?,?)";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$commentText, OurPDO::PARAM_STR);
            $prepare->bindValue(2,$commentParent, OurPDO::PARAM_INT);
            $prepare->bindValue(3,$commentDateUpdate, OurPDO::PARAM_STR);
            $prepare->bindValue(4,$commentDatePublish, OurPDO::PARAM_STR);


            $prepare->execute();

            $prepare->closeCursor();

            return "Commentaire ajouté";

        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    public function delete(int $id)
    {
        
    }

}