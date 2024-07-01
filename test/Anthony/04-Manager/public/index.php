<?php

// session
session_start();

// on va utiliser notre connexion personnalisée (singleton)
use model\OurPDO;
// on va utiliser notre manager de user
use model\Manager\UserManager;
// on va utiliser notre classe de mapping de user
use model\Mapping\UserMapping;

// Appel de la config
require_once "../config.php";


// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY . '/' . $class . '.php';
});

// connect database
$dbConnect = OurPDO::getInstance(
    DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET,
    DB_LOGIN,
    DB_PWD
);

// create user Manager
$userManager = new UserManager($dbConnect);



// detail view
if (isset($_GET['view']) && ctype_digit($_GET['view'])) {
    $idUser = (int) $_GET['view'];
    // select one comment
    $selectOneUser = $userManager->selectOneById($idUser);
    // view
    require "../view/user/selectOneUser.view.php";

    // insert user page
} elseif (isset($_GET['insert'])) {

    // real insert comment
    if (isset(
        $_POST['user_login'],
        $_POST['user_password'],
        $_POST['user_full_name'],
        $_POST['user_mail'],
        $_POST['user_status'],
        $_POST['user_secret_key'],
        $_POST['permission_permission_id']
    )) {
        try {
            // create user
            $user = new UserMapping($_POST);

            // insert user
            $insertUser = $userManager->insert($user);

            if ($insertUser === true) {
                header("Location: ./");
                exit();
            } else {
                $error = $insertUser;
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
        var_dump($user);
    }
    // view
    require "../view/user/insertUser.view.php";

    // delete user
} elseif (isset($_GET['update']) && ctype_digit($_GET['update'])) {
    $idUser = (int)$_GET['update'];

    // update user
    if (isset(

        $_POST['user_login'],
        $_POST['user_password'],
        $_POST['user_full_name'],
        $_POST['user_mail'],
        $_POST['user_status'],
        $_POST['user_secret_key'],
        $_POST['permission_permission_id']
    )) {
        try {
            // create user
            $user = new UserMapping($_POST);
            $user->setUserId($idUser);
            // update user
            $updateUser = $userManager->update($user);
            if ($updateUser === true) {
                header("Location: ./");
                exit();
            } else {
                $error = $updateUser;
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
    // select one user
    $selectOneUser = $userManager->selectOneById($idUser);
    // view
    require "../view/user/updateUser.view.php";

    // delete user
} elseif (isset($_GET['delete']) && ctype_digit($_GET['delete'])) {
    $idUser = (int) $_GET['delete'];
    // delete user
    $deleteUser = $userManager->delete($idUser);
    if ($deleteUser === true) {
        header("Location: ./");
        exit();
    } else {
        $error = $deleteUser;
    }

    // homepage
} else {
    // select all users
    $selectAllUser = $userManager->selectAll();
    // view
    require "../view/user/selectAllUser.view.php";
}

$dbConnect = null;
