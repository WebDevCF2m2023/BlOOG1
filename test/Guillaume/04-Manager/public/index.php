<?php

// session
session_start();

// on va utiliser notre connexion personnalisée (singleton)
use model\OurPDO;
// on va utiliser notre manager de commentaires
use model\Manager\CommentManager;
// on va utiliser notre manager des images
use model\Manager\ImageManager;
// on va utiliser notre classe de mapping de commentaires
use model\Mapping\CommentMapping;
// on va utiliser notre classe de mapping des images
use model\Mapping\ImageMapping;

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

// create image Manager
$imageManager = new ImageManager($dbConnect);


/*
// detail view
if(isset($_GET['view'])&&ctype_digit($_GET['view'])){
    $idComment = (int) $_GET['view'];
    // select one comment
    $selectOneComment = $commentManager->selectOneById($idComment);
    // view
    require "../view/comment/selectOneComment.view.php";

// insert comment page
}elseif(isset($_GET['insert'])){

// real insert comment
    if(isset($_POST['comment_text'])) {
        try{
            // create comment
            $comment = new CommentMapping($_POST);
            // set date
            $comment->setCommentDatePublish(new DateTime());
            // insert comment
            $insertComment = $commentManager->insert($comment);

            if($insertComment===true) {
                header("Location: ./");
                exit();
            }else{
                $error = $insertComment;
            }
        }catch(Exception $e){
            $error = $e->getMessage();
        }
        //var_dump($comment);

    }
    // view
    require "../view/comment/insertComment.view.php";

// delete comment
}elseif (isset($_GET['update'])&&ctype_digit($_GET['update'])) {
    $idComment = (int)$_GET['update'];

    // update comment
    if (isset($_POST['comment_text'])) {
        try {
            // create comment
            $comment = new CommentMapping($_POST);
            $comment->setCommentId($idComment);
            // update comment
            $updateComment = $commentManager->update($comment);
            if($updateComment===true) {
                header("Location: ./");
                exit();
            }else{
                $error = $updateComment;
            }
        }catch (Exception $e) {
            $error = $e->getMessage();
        }

    }
    // select one comment
    $selectOneComment = $commentManager->selectOneById($idComment);
    // view
    require "../view/comment/updateComment.view.php";

// delete comment
}elseif(isset($_GET['delete'])&&ctype_digit($_GET['delete'])){
    $idComment = (int) $_GET['delete'];
    // delete comment
    $deleteComment = $commentManager->delete($idComment);
    if($deleteComment===true) {
        header("Location: ./");
        exit();
    }else{
        $error = $deleteComment;
    }

// homepage
}else{
    // select all images
    $selectAllImages = $imageManager->selectAll();
    // view
    require "../view/image/selectAllImages.view.php";
}
*/
// detail view
if(isset($_GET['view'])&&ctype_digit($_GET['view'])){
    $idImage = (int) $_GET['view'];
    // select one image
    $selectOneImage = $imageManager->selectOneById($idImage);
    // view
    require "../view/image/selectOneImage.view.php";

// insert image page
}elseif(isset($_GET['insert'])){

// real insert image
    if(isset($_POST['image_url'])) {
        $urlImage = $_POST['image_url'];
        try{
            $typeImage = $_POST['image_type'];
            $descriptionImage = $_POST['image_description'];
            $urlImage = $_POST['image_url'];
            $testUrl = filter_var($urlImage, FILTER_VALIDATE_URL); 
            if (!$testUrl) {
                die('URL invalid');
            }else {
                $cleanUrl = filter_var($urlImage, FILTER_SANITIZE_URL); 
            // create image
            $image = new ImageMapping($_POST);
            $image->setImageId($idImage);
            $image->setImageUrl($cleanUrl);
            $image->setImageDescription($descriptionImage);
            $image->setImageType($typeImage);
            // insert image
            $insertImage = $imageManager->insert($image);
            }   
            if($insertImage===true) {
                header("Location: ./");
                exit();
            }else{
                $error = $insertImage;
            }
        }catch(Exception $e){
            $error = $e->getMessage();
        }
        //var_dump($image);

    }
    // view
    require "../view/image/insertImage.view.php";

// delete image
}elseif (isset($_GET['update'])&&ctype_digit($_GET['update'])) {
    $idImage = (int)$_GET['update'];

    // update image
    if (isset($_POST['image_url'])) {
        try {
            $typeImage = $_POST['image_type'];
            $descriptionImage = $_POST['image_description'];
            $urlImage = $_POST['image_url'];
            $testUrl = filter_var($urlImage, FILTER_VALIDATE_URL); 
            if (!$testUrl) {
                die('URL invalid');
            }else {
                $cleanUrl = filter_var($urlImage, FILTER_SANITIZE_URL); 
            // create image
            $image = new ImageMapping($_POST);
            $image->setImageId($idImage);
            $image->setImageUrl($cleanUrl);
            $image->setImageDescription($descriptionImage);
            $image->setImageType($typeImage);
            // update image
            $updateImage = $imageManager->update($image);
        }
            if($updateImage===true) {
                header("Location: ./");
                exit();
            }else{
                $error = $updateImage;
            }
        }catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
    // select one image
    $selectOneImage = $imageManager->selectOneById($idImage);
    // view
    require "../view/image/updateImage.view.php";

// delete image
}elseif(isset($_GET['delete'])&&ctype_digit($_GET['delete'])){
    $idImage = (int) $_GET['delete'];
    // delete image
    $deleteImage = $imageManager->delete($idImage);
    if($deleteImage===true) {
        header("Location: ./");
        exit();
    }else{
        $error = $deleteImage;
    }

// homepage
}else{
    // select all images
    $selectAllImages = $imageManager->selectAll();
    // view
    require "../view/image/selectAllImages.view.php";
}

$dbConnect = null;