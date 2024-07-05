<?php
/*
 * Interface InterfaceUserManager qui définit les méthodes que toute classe de type UserManager doit implémenter.
 * Ces méthodes sont liées aux actions de connexion et de déconnexion d'un utilisateur.
 * Les mots de passe sont hachés en utilisant la fonction password_hash() de PHP.
 * La vérification des mots de passe se fait en utilisant la fonction password_verify() de PHP.
 * La clef unique est générée en utilisant la fonction uniqid() de PHP.
 */
namespace model\Interface;

use model\Abstract\AbstractMapping;

interface InterfaceUserManager
{
    public function register(string $login, string $email, string $password);

    public function login(string $login, string $password);

    public function hashPassword(string $password): string;

    public function verifyPassword(string $password, string $hash): bool;

    public function generateUniqueKey(): string;

    public function updateKey(string $login, string $key);

    public function verifyMailByKey(string $key,string $mail);

    public function logout();

}