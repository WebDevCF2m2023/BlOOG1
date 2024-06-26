<?php

// session
session_start();

// on va utiliser notre connexion personnalisée (singleton)
use model\OurPDO;
// on va utiliser notre manager de commentaires
use model\Manager\FileManager;
// on va utiliser notre classe de mapping de commentaires
use model\Mapping\FileMapping;

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
$fileManager = new FileManager($dbConnect);



// detail view
if(isset($_GET['view'])&&ctype_digit($_GET['view'])){
    $id = (int) $_GET['view'];
    // select one comment
    $selectOneFile = $fileManager->selectOneById($id);
    // view
    require "../view/file/selectOneFile.view.php";

// insert comment page
}elseif(isset($_GET['insert'])){

// real insert comment
    if(isset($_POST['file_text'])) {
        try{
            // create comment
            $file = new FileMapping($_POST);
            $file->setFileUrl($_POST["file_text"]);
     
         
            $insertFile = $fileManager->insert($file);

            if($insertFile===true) {
                header("Location: ./");
                exit();
            }else{
                $error = $insertFile;
            }
        }catch(Exception $e){
            $error = $e->getMessage();
        }
        //var_dump($comment);

    }
    // view
    require "../view/file/insertFile.view.php";

// delete comment
}elseif (isset($_GET['update'])&&ctype_digit($_GET['update'])) {
    $id = (int)$_GET['update'];

    // update comment
    if (isset($_POST['file_url'])) {
        try {
            // create comment
            $file = new FileMapping($_POST);
            $file->setFileId($id);
            // update comment
            $updateFile = $fileManager->update($file);
            if($updateFile===true) {
                header("Location: ./");
                exit();
            }else{
                $error = $updateFile;
            }
        }catch (Exception $e) {
            $error = $e->getMessage();
        }

    }
    // select one comment
    $selectOneFile = $fileManager->selectOneById($id);
    // view
    require "../view/file/updateFile.view.php";

// delete comment
}elseif(isset($_GET['delete'])&&ctype_digit($_GET['delete'])){
    $idFile = (int) $_GET['delete'];
    // delete comment
    $deleteFile = $fileManager->delete($idFile);
    if($deleteFile===true) {
        header("Location: ./");
        exit();
    }else{
        $error = $deleteFile;
    }

// homepage
}else{
    // select all comments
    $selectAllFiles = $fileManager->selectAll();
    // view
    require "../view/file/selectAllFile.view.php";
}

$dbConnect = null;