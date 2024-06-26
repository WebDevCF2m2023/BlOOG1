<?php

namespace model\Manager ;

use Exception;
use model\Abstract\AbstractMapping;
use model\Interface\InterfaceManager;
use model\Mapping\ArticleMapping;
use model\trait\TraitRunQuery;
use model\OurPDO;


class ArticleManager implements InterfaceManager{

    use TraitRunQuery;
    private ?OurPDO $connect = null;

    public function __construct(OurPDO $db){
        $this->connect = $db;
    }


    public function selectAll(): ?array  // sauf les noms des tables, ceci est souvent similaire - faut que remplacer article_ par comment_ donc sans doute possible de mettre ailleurs
    {
        $sql = "SELECT * FROM `article`
         ORDER BY `article_date_create` DESC";
        
        $array = $this->runQuery($sql);
        if (!is_array($array)) throw new Exception("");
        $arrayArticles = [];
        foreach($array as $value){
            $arrayArticles[] = new ArticleMapping($value);
        }
        return $arrayArticles;
    }

/* 
*
*   Tout le reste ici est pour satisfait le Interface pendant que je crée les autres fonctions
*
*/


    // RECUEPRATION D'UN ARTICLE VIA ID 
    public function selectOneById(int $id): null|string|ArticleMapping
    {

        $sql     = "SELECT * 
                    FROM `article` 
                    WHERE `article_id`= ?";
        $getStmt = $this->connect->prepare($sql);
        $getStmt->bindValue(1,$id, OurPDO::PARAM_INT);

        try{
            $getStmt->execute();
            if($getStmt->rowCount()===0) return null;
                $result = $getStmt->fetch(OurPDO::FETCH_ASSOC);
                $result = new ArticleMapping($result);
                $getStmt->closeCursor();
            return $result;
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    public function insert(AbstractMapping $mapping): bool|string {
 
    
            // requête préparée
            $sql = "INSERT INTO `article`(`article_title`, `article_slug`, `article_text`,`user_user_id`)  VALUES (?,?,?,?)";
            $addStmt = $this->connect->prepare($sql);

            try{
                $addStmt->bindValue(1,$mapping->getArticleTitle());
                $addStmt->bindValue(2,$mapping->getArticleSlug());
                $addStmt->bindValue(3,$mapping->getArticleText());
                $addStmt->bindValue(4,1, OurPDO::PARAM_INT);

    
                $addStmt->execute();
    
                $addStmt->closeCursor();
    
                return true;
    
            }catch(Exception $e){
                return $e->getMessage();
            }
        }

    public function update(AbstractMapping $mapping) {

        $sql = "UPDATE `article` 
                SET `article_title`=?,
                    `article_slug`=?,
                    `article_text`=?, 
                    `article_date_update`=? 
                WHERE `article_id`=?";
        // mise à jour de la date de modification
        $mapping->setArticleDateUpdate(date("Y-m-d H:i:s"));
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$mapping->getArticleTitle());
            $prepare->bindValue(2,$mapping->getArticleSlug());
            $prepare->bindValue(3,$mapping->getArticleText());
            $prepare->bindValue(4,$mapping->getArticleDateUpdate());
            $prepare->bindValue(5,$mapping->getArticleId(), OurPDO::PARAM_INT);

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
    }


/*
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

*/



    // SUPPRESSION D'UN ARTICLE
    public function delete(int $id): bool|string
    {
        $sql     = "DELETE FROM `article` 
                    WHERE `article_id`=?";
        $delStmt = $this->connect->prepare($sql);

        try{
            $delStmt->bindValue(1,$id, OurPDO::PARAM_INT);
            $delStmt->execute();
            $delStmt->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

}

