<?php

session_start();

// on va chercher le chemin de ExempleMapping

use model\Mapping\ArticleMapping;
use model\Mapping\ExempleMapping;



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
    "exemple_name" => "                 Un autre exemple",
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

$article1 = new ArticleMapping([
    "article_id" => 1,
    "article_title" => "article1",
    "article_slug" => "slug1",
    "article_text" => "Voici, un peu de texte",
    "article_date_create" => new DateTime(),
    "article_date_update" => new DateTime(),
    "article_date_publish" => new DateTime(),
    "user_user_id" => 2,
    
]);

var_dump($exemple1,$exemple2,$exemple3);
var_dump($article1);