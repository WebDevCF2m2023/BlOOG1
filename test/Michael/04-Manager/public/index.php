<?php

// session
session_start();

// on va utiliser notre connexion personnalisée (singleton)
use model\OurPDO;
use model\Mapping\CommentMapping;
use model\Manager\CommentManager;

// Appel de la config
require_once "../config.php";

// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});

// connect database
$dbConnect = OurPDO::getInstance( DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,
DB_LOGIN,
DB_PWD);

// create comment Manager
$commentManager = new CommentManager($dbConnect);


// homepage
if(empty($_GET)){
    // all comments
    $selectComment = $commentManager->selectAll();
    // view
    require "../view/selectAllComment.view.php";
// detail view
}elseif(isset($_GET['view'])&&ctype_digit($_GET['view'])){
    $idComment = (int) $_GET['view'];
    // select one comment
    $selectOneComment = $commentManager->selectOneById($idComment);
    // view
    require "../view/selectOneComment.view.php";
}


$dbConnect = null;