<?php

/*
 * Ce fichier sera le router public de notre application
 */

use model\Manager\ArticleManager;

// on instancie le manager des articles
$articleManager = new ArticleManager($db);

// si la route n'est pas définie, on affiche la page d'accueil
$route = $_GET['route'] ?? 'accueil';

// on va charger le contrôleur en fonction de la route
switch ($route) {
    case 'accueil':
        // on charge les articles pour la page d'accueil
        $articles = $articleManager->selectAllArticleHomepage();
        // vue de la base NON TWIG
        include PROJECT_DIRECTORY."/view/publicView/public.homepage.php";
        break;
    case 'articles':
        // on va charger les articles

        $articles = $articleManager->getArticles();

        break;
    default:
        include PROJECT_DIRECTORY."/controller/publicController.php";
        break;
}
