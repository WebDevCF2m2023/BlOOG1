<?php

// session
session_start();

// on va chercher le chemin de ExempleMapping

use model\Mapping\CategoryMapping;


// Appel de la config
require_once "../config.php";

// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY. '/' .$class . '.php';
});

$exemple1 = new CategoryMapping([
    "category_id" => 1,
    "category_name" => "exemple1",
    "category_slug" => "description1",
    "category_description" => "heyhey",
    "category_parent" => 3,
]);

$exemple2 = new CategoryMapping([
    "category_id" => 2,
    "category_name" => "Un autre exemple",
    "category_slug" => "Voici une description d'un être aimé",
    "category_description" => 83,
    "category_parent" => 13,
]);

$exemple3 = new CategoryMapping([
    "category_id" => 3,
    "category_name" => "Encore un \"autre\" exemple",
    "category_slug" => "Voici une description d'un être aimé, <br>, ou non",
    "category_description" => 21,
    "category_parent" => 22,
]);

var_dump($exemple1,$exemple2,$exemple3);
