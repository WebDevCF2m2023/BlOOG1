<?php

// session
session_start();

// on va utiliser notre connexion personnalisée (singleton)
use model\OurPDO;
// on va utiliser notre manager de commentaires
use model\Manager\PermissionManager;
// on va utiliser notre classe de mapping de commentaires
use model\Mapping\PermissionMapping;

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
$permissionManager = new PermissionManager($dbConnect);



// detail view
if(isset($_GET['view'])&&ctype_digit($_GET['view'])){
    $idPermission = (int) $_GET['view'];
    // select one comment
    $selectOnePermission = $permissionManager->selectOneById($idPermission);
    // view
    require "../view/comment/selectOneComment.view.php";

// insert comment page
}elseif(isset($_GET['insert'])){

// real insert comment
    if(isset($_POST['permission_name'])) {
        try{
            // create comment
            $permission = new PermissionMapping($_POST);
            
            // insert comment
            $insertPermission = $permissionManager->insert($permission);

            if($insertPermission===true) {
                header("Location: ./");
                exit();
            }else{
                $error = $insertPermission;
            }
        }catch(Exception $e){
            $error = $e->getMessage();
        }
        

    }
    // view
    require "../view/comment/insertComment.view.php";

// delete permission
}elseif (isset($_GET['update'])&&ctype_digit($_GET['update'])) {
    $idPermission = (int)$_GET['update'];

    // update permission
    if (isset($_POST['comment_text'])) {
        try {
            // create permission
            $permission = new PermissionMapping($_POST);
            $permission->setPermissionId($idPermission);
            // update permission
            $updatePermission = $permissionManager->update($permission);
            if($updatePermission===true) {
                header("Location: ./");
                exit();
            }else{
                $error = $updatePermission;
            }
        }catch (Exception $e) {
            $error = $e->getMessage();
        }

    }
    // select one permission
    $selectOnePermission = $permissionManager->selectOneById($idPermission);
    // view
    require "../view/comment/updateComment.view.php";

// delete permission
}elseif(isset($_GET['delete'])&&ctype_digit($_GET['delete'])){
    $idPermission = (int) $_GET['delete'];
    // delete permission
    $deletePermission = $permissionManager->delete($idPermission);
    if($deletePermission===true) {
        header("Location: ./");
        exit();
    }else{
        $error = $deletePermission;
    }

// homepage
}else{
    // select all permission
    $selectAllPermissions = $permissionManager->selectAll();
    // view
    require "../view/comment/selectAllComment.view.php";
}

$dbConnect = null;