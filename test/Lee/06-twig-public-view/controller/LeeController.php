<?php

/*
 * Ce fichier sera le router public de notre application
 */

use model\Manager\ArticleManager;
use model\Manager\CategoryManager;
use model\Manager\CommentManager;

use model\Manager\UserManager;

// on instancie le manager des articles
$articleManager = new ArticleManager($db);
// on instancie le manager des catégories
$categoryManager = new CategoryManager($db);
// on instancie le manager des commentaires
$commentManager = new CommentManager($db);

$userManager = new UserManager($db);

// si la route n'est pas définie, on affiche la page d'accueil
$route = $_GET['route'] ?? 'accueil';

// on charge les catégories pour le menu sur toutes les pages
$categories = $categoryManager->selectAll();

// on va charger les modèles et les vues en fonction de la route
    $subRoute = $_GET['selection'] ?? 'author';
switch ($route) {
    case 'accueil':
        $articles = $articleManager->selectAllArticleHomepage();
        echo $twig->render("publicView/public.home.view.twig", ["articles" => $articles]);
        break;
    case 'category':
        $cats = $categoryManager->selectAllCategoriesForLee();
        echo $twig->render("publicView/public.category.view.twig", ["cats" => $cats]);
        break;
    case 'author':
        $users = $userManager->selectAllUsersForLee();
        echo $twig->render("publicView/public.author.view.twig", ["users" => $users]);
        break;
    case 'tags':
        $articles = $articleManager->selectAllArticleHomepage();
        $allTags = $articleManager->selectAllTagsForLee();
        echo $twig->render("publicView/public.tag.view.twig", ['allTags' => $allTags, "articles" => $articles, "categories" => $categories]);
        break;
    case 'select' :
            switch ($subRoute) {
                case 'author' :
                    die("that worked - authors");
                    break;
                case 'category' :
                    die("that worked - cats");
                    break;
                case 'tags' :
                    die("that worked - tags");
                    break;
            }

    case '404':
        // vue de la base NON TWIG
        include PROJECT_DIRECTORY."/view/publicView/public.404.php";
        break;
    default:
        include PROJECT_DIRECTORY."/controller/publicController.php";
        break;
}
