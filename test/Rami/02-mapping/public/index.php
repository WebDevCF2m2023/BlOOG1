<?php

// on va chercher le chemin de ExempleMapping
use model\Mapping\ImageMapping;
use model\Mapping\TagMapping;


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
    "image_url" => "www.tavie.com",
    "image_description" => "description1",
    "article_article_id" => 1,
    
]);

$image2 = new ImageMapping([
    "image_id" => 2,
    "image_url" => "  www.php.be",
    "image_description" => "  Voici une description <br> d'un être aimé",
    "article_article_id" => 83,
    
]);

$image3 = new ImageMapping([
    "image_id" => 3,
    "image_url" => "www.etlaquestioncestpour.com",
    "image_description" => "Voici une description d'un être pas aimé, <br>, ou non",
    "article_article_id" => 21,
    
   
    
    
]);
$tag1 = new TagMapping([
    "tag_id" => 3,
    "tag_slug" => "LaVie est belle",
   
    
   
    
    
]);
$tag2 = new TagMapping([
    "tag_id" => 3,
    "tag_slug" => "AHAHAH AHAHA AHAHAHA   ",
    
    
   
    
    
]);

var_dump($image1,$image2,$image3,$tag1,$tag2);
 