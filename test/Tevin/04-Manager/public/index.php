<?php

// session
session_start();

// on va utiliser notre connexion personnalisée (singleton)
use model\OurPDO;
// on va utiliser notre manager de commentaires
use model\Manager\CommentManager;
// on va utiliser notre classe de mapping de commentaires
use model\Mapping\CommentMapping;

use model\Manager\CategoryManager;

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
// $commentManager = new CommentManager($dbConnect);
$categoryManager = new CategoryManager($dbConnect);


// detail view
if(isset($_GET['view'])&&ctype_digit($_GET['view'])){
    $idCategory = (int) $_GET['view'];
    // select one comment
    $selectOneCategory = $categoryManager->selectOneById($idCategory);
    // view
    require "../view/category/selectOneCategory.view.php";

// insert comment page
}elseif(isset($_GET['insert'])){

// real insert comment
    if(isset($_POST['category_name'], $_POST['category_slug'], $_POST['category_description'])) {
        try{
            // create comment
            $category = new CategoryMapping($_POST);
            // insert comment
            $category->setCategoryName($_POST['category_name']);
            $category->setCategorySlug($_POST['category_slug']);
            $category->setCategoryDescription($_POST['category_description']);
            $insertCategory = $categoryManager->insert($category);

            if($insertCategory===true) {
                header("Location: ./");
                exit();
            }else{
                $error = $insertCategory;
            }
        }catch(Exception $e){
            $error = $e->getMessage();
        }
        //var_dump($comment);

    }
    // view
    require "../view/category/insertCategory.view.php";

// delete comment
}elseif (isset($_GET['update'])&&ctype_digit($_GET['update'])) {
    $idCategory = (int)$_GET['update'];

    // update comment
    if (isset($_POST['category_name'], $_POST['category_slug'])) {
        try {
            // create comment
            $category = new CategoryMapping($_POST);
            $category->setCategoryId($idCategory);
            // update comment
            $updateCategory = $categoryManager->update($category);
            if($updateCategory===true) {
                header("Location: ./");
                exit();
            }else{
                $error = $updateCategory;
            }
        }catch (Exception $e) {
            $error = $e->getMessage();
        }

    }
    // select one comment
    $selectOneCategory = $categoryManager->selectOneById($idCategory);
    // view
    require "../view/category/updateCategory.view.php";

// delete comment
}elseif(isset($_GET['delete'])&&ctype_digit($_GET['delete'])){
    $idCategory = (int) $_GET['delete'];
    // delete comment
    $deleteCategory = $categoryManager->delete($idCategory);
    if($deleteCategory===true) {
        header("Location: ./");
        exit();
    }else{
        $error = $deleteCategory;
    }

// homepage
}else{
    // select all comments
    $selectAllCategories = $categoryManager->selectAll();
    // view
    require "../view/category/selectAllCategory.view.php";
}

$dbConnect = null;