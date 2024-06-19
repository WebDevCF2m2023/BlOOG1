<?php

// on va chercher le chemin de ExempleMapping
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

$exemple1 = new PermissionMapping([
    "permission_id" => 1,
    "permission_name" => "emrah",
    "permission_description" => "emrah",

]);

$exemple2 = new PermissionMapping([
    "permission_id" => 2,
    "permission_name" => "Un autre exemple",
    "permission_description" => "Voici une description d'un être aimé",
  
]);

$exemple3 = new PermissionMapping([
    "permission_id" => 3,
    "permission_name" => "Encore un \"autre\" exemple",
    "permission_description" => "Voici une description d'un être aimé, <br>, ou non",

]);

var_dump($exemple1,$exemple2,$exemple3);
