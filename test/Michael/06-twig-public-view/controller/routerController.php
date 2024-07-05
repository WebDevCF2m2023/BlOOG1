<?php
/*
 * Ce fichier sera le router général de notre application
 */

// si nous sommes connectés
if (isset($_SESSION['MySession'])) {
    // nous allons charger les autres routers en fonction des permissions
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
    // si nous ne sommes pas connectés,
    // nous chargeons le publicController
    require_once PROJECT_DIRECTORY . "/controller/publicController.php";
}