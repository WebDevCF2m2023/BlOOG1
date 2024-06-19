<?php

// on va chercher le chemin de ExempleMapping
// use model\Mapping\ExempleMapping;
use model\Mapping\ImageMapping;

// session
session_start();

// Appel de la config
require_once "../config.php";

// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY. '/' .$class . '.php';
});

$image1 = new ImageMapping([
    "image_id" => 1,
    "image_url" => "image_url",
    "image_description" => "description",
    "article_article_id" => 1,
    "exemple_date" => new DateTime(),
]);
/*
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

$exemple3 = new ExempleMapping([
    "exemple_id" => 3,
    "exemple_name" => "Encore un \"autre\" exemple",
    "exemple_description" => "Voici une description d'un être aimé, <br>, ou non",
    "exemple_number" => 21,
    "exemple_date" => "Miam",
    "exemple_boolean" => false,
    "exemple_float" => -82.3465,
    "je_suis_un_champ_inexistant" => "je suis un champ inexistant",
]);
var_dump($exemple1,$exemple2,$exemple3);
*/
var_dump($image1);