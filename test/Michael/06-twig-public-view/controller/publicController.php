<?php

/*
 * Ce fichier sera le router public de notre application
 */

// si la route n'est pas définie, on affiche la page d'accueil
$route = $_GET['route'] ?? 'accueil';

// on va charger le contrôleur en fonction de la route
switch ($route) {
    case 'accueil':

        // vue de la base
        include PROJECT_DIRECTORY."/view/publicView/public.homepage.php";
        break;
    default:
        include PROJECT_DIRECTORY."/controller/publicController.php";
        break;
}
