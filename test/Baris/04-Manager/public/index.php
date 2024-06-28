<?php

// session
session_start();

// on va utiliser notre connexion personnalisée (singleton)
use model\OurPDO;
// on va utiliser notre manager de commentaires
use model\Manager\CategoryManager;
// on va utiliser notre classe de mapping de commentaires
use model\Mapping\CategoryMapping;

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
$CategoryManager = new CategoryManager($dbConnect);

if(isset($_GET['categArticles'])){

    // view
    require "../view/category/selectAllComment.articles.view.php";
    exit();
}

// detail view
if(isset($_GET['view'])&&ctype_digit($_GET['view'])){
    $id = (int) $_GET['view'];
    // select one comment
    $selectOneCategory = $CategoryManager->selectOneById($id);
    // view
    require "../view/category/selectOneComment.view.php";

// insert comment page
}elseif(isset($_GET['insert'])){

// real insert comment
    if(isset($_POST['category_name'],$_POST['category_slug'],$_POST['category_description'])) {
        try{
            // create comment
            $category= new CategoryMapping($_POST);
            // set date
            // insert comment
            $category = $CategoryManager->insert($category);

            if($category===true) {
                header("Location: ./");
                exit();
            }else{
                $error = $category;
            }
        }catch(Exception $e){
            $error = $e->getMessage();
        }
        var_dump($category);

    }
    // view
    require "../view/category/insertComment.view.php";

// delete comment
}elseif (isset($_GET['update'])&&ctype_digit($_GET['update'])) {
    $idComment = (int)$_GET['update'];

    // update comment
    if(isset($_POST['category_description'])) {
        try {
            // create comment
            $category = new CategoryMapping($_POST);
            $category->setcategoryId($idComment);
            $category->setcategoryName($_POST['category_name']);
            $category->setcategorySlug($_POST['category_name']);
            $category->setCategoryDescription($_POST['category_description']);
            // update comment
            $updatecategory = $CategoryManager->update($category);
            if($updatecategory===true) {
                header("Location: ./");
                exit();
            }else{
                die($updatecategory);
            }
        }catch (Exception $e) {
            $error = $e->getMessage();
        }

    }if (isset($_GET["update"])) {
        $id = $_GET["update"]; 
        $selectOneCategory = $CategoryManager->selectOneById($id);
        include ("../view/category/updateComment.view.php");
        exit();

    }
    // select one comment
    // view
    require "../view/category/updateComment.view.php";

// delete comment
}elseif(isset($_GET['delete'])&&ctype_digit($_GET['delete'])){
    $category_id  = (int) $_GET['delete'];
    // delete comment
    $deleteCategory = $CategoryManager->delete($category_id);
    if($deleteCategory===true) {
        header("Location: ./");
        exit();
    }else{
        $error = $deleteCategory;
    }

// homepage
}else{
    // select all comments
    $selectAllCategoryManager = $CategoryManager->selectAll();
    // view
    require "../view/category/selectAllComment.view.php";
}

$dbConnect = null;