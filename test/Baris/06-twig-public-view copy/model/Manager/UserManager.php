<?php

namespace model\Manager;

use model\Abstract\AbstractMapping;
use model\Interface\InterfaceManager;
use model\Interface\InterfaceSlugManager;
use model\Interface\InterfaceUserManager;
use model\OurPDO;

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