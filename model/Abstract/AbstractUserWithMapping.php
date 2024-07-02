<?php

namespace model\Abstract;

use model\Abstract\AbstractMapping;
use model\Interface\InterfaceUserManager;

class AbstractUserWithMapping extends AbstractMapping implements InterfaceUserManager
{

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