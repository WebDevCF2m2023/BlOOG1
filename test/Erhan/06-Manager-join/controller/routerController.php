<?php


$array = [
    "hi",
];

if(isset($_GET['withUsers'])){
    echo $twig->render('permission/selectAllWithUsers.view.php.twig', ['chiffres' => $array]);
}elseif(isset($_GET['allPermissions'])){
    echo $twig->render('permission/allPermissions.view.php.twig', ['chiffres' => $array]);
}

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