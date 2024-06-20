<?php

// on va chercher le chemin de ExempleMapping
use model\Mapping\ExempleMapping;
use model\Mapping\ImageMapping;
use model\Mapping\PermissionMapping;

// session
session_start();

// Appel de la config
require_once "../config.php";

// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY. '/' .$class . '.php';
});

$exemple1 = new ExempleMapping([
    "exemple_id" => 1,
    "exemple_name" => "exemple1",
    "exemple_description" => "description1",
    "exemple_number" => 1,
    "exemple_date" => new DateTime(),
    "exemple_boolean" => true,
    "exemple_float" => 1.1,
    "je_suis_un_champ_inexistant" => "je suis un champ inexistant",
]);

$exemple2 = new ExempleMapping([
    "exemple_id" => 2,
    "exemple_name" => "Un autre exemple",
    "exemple_description" => "Voici une description d'un être aimé",
    "exemple_number" => 83,
    "exemple_date" => "2024-03-01 12:17:00",
    "exemple_boolean" => false,
    "exemple_float" => -82.3465,
    "je_suis_un_champ_inexistant" => "je suis un champ inexistant",
]);

$permission = new PermissionMapping([
    "permission_id" => 3,
    "permission_name" => "Encore un \"autre\" exemple",
    "permission_description" => "Voici une description d'un être aimé, <br>, ou non",
  
]);

$image = new ImageMapping([
    "image_id" => 3,
    "image_url" => "Encore un \"autre\" exemple",
    "image_description" => "Voici une description d'un être aimé, <br>, ou non",
    "image_article_id" => 21,
]);

   var_dump($image,$permission);
// var_dump($exemple1,$exemple2,$exemple3);
