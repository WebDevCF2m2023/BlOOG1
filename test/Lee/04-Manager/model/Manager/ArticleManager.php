<?php

namespace model\Manager ;

use Exception;
use model\Interface\InterfaceManager;
use model\Mapping\ArticleMapping;
use model\Abstract\AbstractMapping;
use trait\TraitRunQuery;
use model\OurPDO;
use model\Trait\TraitRunQuery as TraitTraitRunQuery;

class ArticleManager implements InterfaceManager{

    use TraitTraitRunQuery;
    private ?OurPDO $connect = null;

    public function __construct(OurPDO $db){
        $this->connect = $db;
    }


    public function selectAll(): ?array
    {

        $sql = "SELECT * FROM `article`
         ORDER BY `article_date_create` DESC";
        
        $array = $this->runQuery($sql);
        if (!is_array($array)) throw new Exception("")
        $arrayArticles = [];


        foreach($array as $value){
            // on remplit un nouveau tableau contenant les commentaires
            $arrayArticles[] = new ArticleMapping($value);
        }

        // on retourne le tableau
        return $arrayArticles;
    }

    // récupération d'un commentaire via son id
    public function selectOneById(int $id): null|string|ArticleMapping
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

            // création de l'instance ArticleMapping
            $result = new ArticleMapping($result);

            $prepare->closeCursor();
            
            return $result;


        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    // mise à jour d'un commentaire
    public function update(AbstractMapping $mapping): bool|string
    {

        // requête préparée
        $sql = "UPDATE `comment` SET `comment_text`=?, `comment_date_update`=? WHERE `comment_id`=?";
        // mise à jour de la date de modification
        $mapping->setCommentDateUpdate(date("Y-m-d H:i:s"));
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$mapping->getCommentText());
            $prepare->bindValue(2,$mapping->getCommentDateUpdate());
            $prepare->bindValue(3,$mapping->getCommentId(), OurPDO::PARAM_INT);

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }


    // insertion d'un commentaire
    public function insert(AbstractMapping $mapping): bool|string
    {

        // requête préparée
        $sql = "INSERT INTO `comment`(`comment_text`,`user_user_id`,`article_article_id`)  VALUES (?,?,?)";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$mapping->getCommentText());
            $prepare->bindValue(2,1, OurPDO::PARAM_INT);
            $prepare->bindValue(3,1, OurPDO::PARAM_INT);

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    // suppression d'un commentaire
    public function delete(int $id): bool|string
    {
        // requête préparée
        $sql = "DELETE FROM `comment` WHERE `comment_id`=?";
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