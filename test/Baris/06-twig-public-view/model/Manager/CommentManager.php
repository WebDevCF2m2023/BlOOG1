<?php

namespace model\Manager;

use model\Abstract\AbstractMapping;
use model\Interface\InterfaceManager;
use model\OurPDO;

use model\Mapping\CommentMapping;
use model\Mapping\UserMapping;

class CommentManager implements InterfaceManager
{

    private OurPDO $db;
    public function __construct(OurPDO $pdo)
    {
        $this->db = $pdo;
    }

    public function selectAll()
    {
        // TODO: Implement selectAll() method.
    }

    public function selectAllByIDArticle(int $idArticle): ?array
    {
        $prepare = $this->db->prepare("SELECT c.*,u.user_id, u.user_full_name,u.user_login 
        FROM comment c 
        INNER JOIN user u ON c.user_user_id = u.user_id
        WHERE c.article_article_id = :idArticle
                      AND c.comment_is_published = 1
                    ORDER BY c.comment_date_publish DESC ; ");
        $prepare->bindValue(':idArticle', $idArticle, OurPDO::PARAM_INT);
        $prepare->execute();
        if($prepare->rowCount() === 0){
            return null;
        }
        $tabMapping = $prepare->fetchAll();
        $prepare->closeCursor();
        $tabObject = [];
        foreach ($tabMapping as $mapping) {
             $comment = new CommentMapping($mapping);
             $comment->setUser(new UserMapping($mapping));
            $tabObject[] = $comment;
        }
        return $tabObject;
    }

    public function selectOneById(int $id)
    {
        // TODO: Implement selectOneById() method.
    }

    public function insert(AbstractMapping $mapping)
    {
        // TODO: Implement insert() method.
    }

    public function update(AbstractMapping $mapping)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}