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
        $prepare = $this->pdo->prepare("SELECT u.* 
                                              FROM `user` u 
                                              WHERE u.`user_login` = :slug");
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
        $user = $this->selectOneBySlug($login);
        if(!$user) return null;
        $realPass = $user->getUserPassword();
        if(!$this->verifyPassword($password, $realPass)) return null;
        $sql = $this->pdo->prepare("SELECT permission_name FROM `permission` WHERE `permission_id` = ?");
        $sql->bindValue(1, $user->getPermissionPermissionId());
        $sql->execute();
        $permission = $sql->fetch();
        $_SESSION["name"] = $user->getUserFullName();
        $_SESSION["status"] = $user->getUserStatus();
        $_SESSION["permission_name"] = $permission["permission_name"];
        unset($_SESSION["user_password"]);
        $_SESSION["MySession"] = true;
        return true;
    }

    public function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword(string $password, string $hash): bool
    {
        if (!password_verify($password, $hash)) return false;
        return true;
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
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();

        header("Location: ./");
        exit();
    }
}