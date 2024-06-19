<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use DateTime;
use Exception;

class UserMapping extends AbstractMapping
{
    // Les propriétés de la classe sont le nom des
    // attributs de la table Exemple (qui serait en
    // base de données)
    protected int $user_id;
    protected string $user_login;
    protected string $user_password;
    protected ?string $user_full_name;
    protected string $user_mail;
    protected int $user_status;
    protected string $user_secret_key;
    protected ?int $permission_permission_id;

    // Les getters et setters
    // Les getters permettent de récupérer la valeur
    // d'un attribut de la classe

    // Les setters permettent de modifier la valeur
    // d'un attribut de la classe, en utilisant l'hydratation
    // venant de la classe AbstractMapping
    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getUserLogin(): string
    {
        return $this->user_login;
    }

    public function setUserLogin(string $user_login): void
    {
        $this->user_login = $user_login;
    }

    public function getUserPassword(): string
    {
        return $this->user_password;
    }

    public function setUserPassword(string $user_password): void
    {
        $this->user_password = $user_password;
    }

    public function getUserFullName(): ?string
    {
        return $this->user_full_name;
    }

    public function setUserFullName(?string $user_full_name): void
    {
        $this->user_full_name = $user_full_name;
    }

    public function getUserMail(): string
    {
        return $this->user_mail;
    }

    public function setUserMail(string $user_mail): void
    {
        $this->user_mail = $user_mail;

    }

    public function getUserStatus(): int
    {
        return $this->user_status;
    }

    public function setUserStatus(int $user_status): void
    {
        $this->user_status = $user_status;
    }

    public function getUserSecretKey(): string
    {
        return $this->user_secret_key;
    }

    public function setUserSecretKey(string $user_secret_key): void
    {
        $this->user_secret_key = $user_secret_key;
    }

    public function getPermissionPermissionId(): ?int
    {
        return $this->permission_permission_id;
    }

    public function setPermissionPermissionId(?int $permission_permission_id): void
    {
        $this->permission_permission_id = $permission_permission_id;
    }


}