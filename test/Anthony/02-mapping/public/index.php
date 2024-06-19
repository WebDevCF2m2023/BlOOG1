<?php

// on va chercher le chemin de ExempleMapping
use model\Mapping\UserMapping;


// session
session_start();

// Appel de la config
require_once "../config.php";

// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY. '/' .$class . '.php';
});

// chemin pris dans le répertoire racine du projet (config.php)
//echo PROJECT_DIRECTORY;

$test1 = new UserMapping([
    "user_id" => 1,
    "user_login" => "login1",
    "user_password" => "myPassword",
    "user_full_name" => "Anthony",
    "user_mail" => "test@mail.com",
    "user_status" => 1,
    "user_secret_key" => "ma clé secrete",
    "permission_permission_id" => 2,
]);



var_dump($test1);
