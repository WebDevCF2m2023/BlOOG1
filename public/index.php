<?php

// session
session_start();

// Appel de la config
require_once "../config.php";

// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require '../' .$class . '.php';
});

// test d'intégration de la classe UserMapping
$user = new \model\Mapping\UserMapping([
    'user_id' => 1,
    'user_login' => 'admin',
    'user_password' => 'admin',
    'user_full_name' => 'admin',
    'user_mail' => 'mich@cf2m.be',
    'user_status' => 1,
    'user_secret_key' => '123456',
    'permission_permission_id' => 1,
    ]);

// test d'intégration de la classe ImageMapping
$image = new \model\Mapping\ImageMapping([
    'image_id' => 1,
    'image_url' => 'https://www.google.com',
    'image_description' => 'image de test',
    'article_article_id' => 1,
    'exemple_date' => new DateTime(),
    ]);

var_dump($user, $image);