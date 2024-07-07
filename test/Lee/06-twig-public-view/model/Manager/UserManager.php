<?php

namespace model\Manager;

use model\Abstract\AbstractMapping;
use model\Interface\InterfaceManager;
use model\Interface\InterfaceSlugManager;
use model\Interface\InterfaceUserManager;
use model\Mapping\ArticleMapping;
use model\Mapping\CategoryMapping;
use model\Mapping\UserMapping;
use model\OurPDO;

class UserManager implements InterfaceManager, InterfaceSlugManager, InterfaceUserManager
{

    private OurPDO $pdo;

    public function __construct(OurPDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function selectAllWithArtCount() {
        $query = $this->pdo->query("
            SELECT *, 
                (SELECT COUNT(*)
            FROM article a
            WHERE a.user_user_id = u.user_id) as user_article_count 
            FROM `user` u
            ");
        if ($query->rowCount() == 0) return null;
        $tabMapping = $query->fetchAll(OURPDO::FETCH_ASSOC);
        $query->closeCursor();
        $tabObject = [];
        foreach ($tabMapping as $mapping) {
            $tabObject[] = new UserMapping($mapping);
        }
        return $tabObject;
    }
    public function selectAll($limit=999)
    {
        $selectAll = $this->pdo->prepare("SELECT * 
                                                FROM (SELECT * 
                                                      FROM user 
                                                      ORDER BY RAND() 
                                                      LIMIT $limit) as randSelect 
                                                ORDER BY user_id");
        $selectAll->execute();
        if($selectAll->rowCount() === 0){
            return null;
        }
        $allUsers = $selectAll->fetchAll();
        $selectAll->closeCursor();
        $userObject = [];
        foreach ($allUsers as $mapping) {
            $userObject[] = new CategoryMapping($mapping);
        }
        return $userObject;
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

    public function selectOneBySlug(string $slug): object
    {
        // TODO: Implement selectOneBySlug() method.
    }

    public function register(string $login, string $email, string $password)
    {
        // TODO: Implement register() method.
    }

    public function login(string $login, string $password)
    {
        // TODO: Implement login() method.
    }

    public function hashPassword(string $password): string
    {
        // TODO: Implement hashPassword() method.
    }

    public function verifyPassword(string $password, string $hash): bool
    {
        // TODO: Implement verifyPassword() method.
    }

    public function generateUniqueKey(): string
    {
        // TODO: Implement generateUniqueKey() method.
    }

    public function updateKey(string $login, string $key)
    {
        // TODO: Implement updateKey() method.
    }

    public function verifyMailByKey(string $key, string $mail)
    {
        // TODO: Implement verifyMailByKey() method.
    }

    public function logout()
    {
        // TODO: Implement logout() method.
    }
}