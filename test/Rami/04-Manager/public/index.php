<?php

// session
session_start();

// on va utiliser notre connexion personnalisée (singleton)
use model\OurPDO;
// on va utiliser notre manager de tag
use model\Manager\TagManager;
// on va utiliser notre classe de mapping de tag
use model\Mapping\TagMapping;

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

// create tag Manager
$TagManager = new TagManager($dbConnect);
//var_dump($TagManager);



// detail view
if(isset($_GET['view'])&&ctype_digit($_GET['view'])){
    $idTag = (int) $_GET['view'];
    // select one tag
    $selectOneTag = $TagManager->selectOneById($idTag);
    // view
    require "../view/tag/selectOneTag.view.php";

// insert tag page
}elseif(isset($_GET['insert'])){

// real insert tag
    if(isset($_POST['tag_slug'])) {
        try{
            // create tag
            $tag = new TagMapping($_POST);
            // set date
           // $tag->setTagDatePublish(new DateTime()); Aucun Date pour tag disponible dans la base de données
            // insert tag
            $insertTag = $TagManager->insert($tag);

            if($insertTag===true) {
                header("Location: ./");
                exit();
            }else{
                $error = $insertTag;
            }
        }catch(Exception $e){
            $error = $e->getMessage();
        }
        //var_dump($tag);

    }
    // view
    require "../view/tag/insertTag.php";

// delete tag
}elseif (isset($_GET['update'])&&ctype_digit($_GET['update'])) {
    $idTag = (int)$_GET['update'];

    // update tag
    if (isset($_POST['tag_slug'])) {

        $cleanSlug = $_POST['tag_slug'];
        try {
            // create comment
            $tag = new TagMapping($_POST);
            $tag->setTagId($idTag);
            $tag->setTagSlug($cleanSlug);
            // update tag

            $updateTag = $TagManager->update($tag);
            if($updateTag===true) {
                header("Location: ./");
                exit();
            }else{
                $error = $updateTag;
            }
        }catch (Exception $e) {
            $error = $e->getMessage();
        }

    }
    // select one tag
    $selectOneTag = $TagManager->selectOneById($idTag);
    // view
    require "../view/tag/updateTag.view.php";

// delete TAG
}elseif(isset($_GET['delete'])&&ctype_digit($_GET['delete'])){
    $idTag = (int) $_GET['delete'];
    // delete TAG
    $deleteTag = $TagManager->delete($idTag);
    
    if($deleteTag===true) {
        header("Location: ./");
        exit();
    }else{
        $error = $deleteTag;
    }

// homepage
}else{
    // select all tags
    $selectAllTag = $TagManager->selectAll();
    // view
    require "../view/tag/selectAllTag.view.php";
}

$dbConnect = null;