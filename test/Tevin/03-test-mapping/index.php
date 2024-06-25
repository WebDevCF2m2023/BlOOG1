<?php

use model\Mapping\ImageMapping;


// Appel de la config
require_once "../../../config.php";

// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
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
$image = new ImageMapping([
    'image_id' => 1,
    'image_url' => 'https://www.google.com',
    'image_description' => 'image de test',
    'image_type' => 'jpg',
    'article_article_id' => 1,
    'exemple_date' => new DateTime(),
]);

// test d'intégration de la classe PermissionMapping
$permission = new \model\Mapping\PermissionMapping([
    'permission_id' => 1,
    'permission_name' => 'admin',
    'permission_description' => 'admin <br> ho admin',
]);

// test d'intégration de la classe CategoryMapping
$category = new \model\Mapping\CategoryMapping([
    'category_id' => 1,
    'category_name' => 'admin',
    'category_slug' => 'admin',
    'category_description' => 'admin <br> ho admin',
    'category_parent' => 1,
]);

// test d'intégration de la classe CommentMapping
$comment = new \model\Mapping\CommentMapping([
    'comment_id' => 1,
    'comment_text' => '<br>coucou',
    'comment_parent' => 1,
    'comment_date_create' => "2021-09-01 00:00:00",
    'comment_date_update' => new DateTime(),
    'comment_date_publish' => new DateTime(),
    'comment_is_published' => 1,
    'user_user_id' => 1,
    'article_article_id' => 1,
]);

// test d'intégration de la classe ArticlesMapping

$article = new \model\Mapping\ArticlesMapping([
    'article_id' => 1,
    'article_title' => 'admin',
    'article_slug' => 'admin',
    'article_text' => 'admin <br> ho admin',
    'article_date_create' => new DateTime(),
    'article_date_update' => new DateTime(),
    'article_date_publish' => new DateTime(),
    'user_user_id' => 1,
]);

// test d'intégration de la classe TagMapping
$tag = new \model\Mapping\TagMapping([
    'tag_id' => 1,
    'tag_slug' => 'admin',
]);

// test d'intégration de la classe FileMapping
$file = new \model\Mapping\FileMapping([
    'file_id' => 1,
    'file_url' => 'mon.pdf',
    'file_description' => 'un PDF de test',
    'file_type' => 'pdf',
    'article_article_id' => 1,
]);



var_dump($user, $image, $permission, $category, $comment,$article,$tag,$file);

// Essais sur OurPDO

use model\OurPDO;

$connectDB1 = OurPDO::getInstance(
    DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,
    DB_LOGIN,
    DB_PWD
);

$connectDB2 = OurPDO::getInstance(
    DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,
    DB_LOGIN,
    DB_PWD
);

$connectDB3 = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,
DB_LOGIN,
DB_PWD);

$connectDB4 = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,
DB_LOGIN,
DB_PWD);
var_dump($connectDB1, $connectDB2,$connectDB3,$connectDB4);