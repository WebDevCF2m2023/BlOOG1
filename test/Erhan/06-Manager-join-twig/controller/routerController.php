<?php


use model\Manager\PermissionManager;

$permissionManager = new PermissionManager($dbConnect);

$users = $permissionManager->selectAll();

$usersHomepage = $permissionManager->selectAllWithUsers();


if(isset($_GET['withUsers'])){
    echo $twig->render('permission/PublicView/selectAllWithUsers.view.html.twig', ['permissionUsers' => $usersHomepage] );
}elseif(isset($_GET['allPermissions'])){
    echo $twig->render('permission/PublicView/allPermissions.view.html.twig', ['permissions' => $users]);
}else{
    echo $twig->render('permission/PublicView/homepage.view.html.twig');
}
die();



// si nous sommes connectés
if (isset($_SESSION['MySession'])) {
    $router = $_SESSION['permission_name'];
    switch ($router) {
        case 'Administrateur':
            // si nous sommes Administrateur
            break;
        case 'Modérateur':
            // si nous sommes Modérateur
            break;
        case 'Auteur':
            // si nous sommes Auteur
            break;
        // Abonné par défaut
        default:
            // si nous sommes Abonné
            break;
    }
} else {
    // si nous ne sommes pas connectés
    // nous chargeons le publicController
    require_once PROJECT_DIRECTORY . "/controller/publicController.php";
}