<?php

namespace model\Manager;

use model\Abstract\AbstractMapping;
use model\Interface\InterfaceManager;
use model\Interface\InterfaceSlugManager;
use model\Interface\InterfaceUserManager;
use model\OurPDO;
use model\Mapping\UserMapping;

class UserManager implements InterfaceManager, InterfaceSlugManager, InterfaceUserManager
{

    private OurPDO $pdo;

    public function __construct(OurPDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll()
    {
        // TODO: Implement selectAll() method.
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

    public function selectOneBySlug(string $slug): ?UserMapping
    {
        $prepare = $this->pdo->prepare("SELECT u.user_id, u.user_full_name, u.`user_login` FROM `user` u WHERE u.`user_login` = :slug");
        $prepare->execute([':slug' => $slug]);
        if($prepare->rowCount() === 0) return null;
        return new UserMapping($prepare->fetch());
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