<?php

// session
session_start();

// on va utiliser notre connexion personnalisée (singleton)
use model\OurPDO;
use model\Manager\CommentManager;
use model\Mapping\CommentMapping;

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
    require "../view/comment/selectAllComment.view.php";
// detail view
}elseif(isset($_GET['view'])&&ctype_digit($_GET['view'])){
    $idComment = (int) $_GET['view'];
    // select one comment
    $selectOneComment = $commentManager->selectOneById($idComment);
    // view
    require "../view/comment/selectOneComment.view.php";
// insert comment
}elseif(isset($_GET['insert'])){

// insert comment
    if(isset($_POST['comment_text'])) {
        // insert comment
        $comment = new CommentMapping($_POST);
        var_dump($comment);
        echo $insertComment = $commentManager->insert($comment);
    }
    // view
    require "../view/comment/insertComment.view.php";
}elseif (isset($_GET['update'])&&ctype_digit($_GET['update'])) {
    $idComment = (int)$_GET['update'];
    // select one comment
    $selectOneComment = $commentManager->selectOneById($idComment);
    // update comment
    if (isset($_POST['comment_text'])) {
        // update comment
        $comment = new CommentMapping($_POST);
        $comment->setCommentId($idComment);
        echo $updateComment = $commentManager->update($comment);
    }
    // view
    require "../view/comment/updateComment.view.php";
}

$dbConnect = null;