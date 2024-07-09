<?php

/*
 * Ce fichier sera le router public de notre application
 */

use model\Manager\ArticleManager;
use model\Manager\CategoryManager;
use model\Manager\CommentManager;
use model\Manager\TagManager;
use model\Manager\UserManager;

// on instancie le manager des articles
$articleManager = new ArticleManager($db);
// on instancie le manager des catégories
$categoryManager = new CategoryManager($db);
// on instancie le manager des commentaires
$commentManager = new CommentManager($db);
// on instancie le manager des tags
$tagManager = new TagManager($db);
// on instancie le manager des utilisateurs
$userManager = new UserManager($db);

// si la route n'est pas définie, on affiche la page d'accueil
$route = $_GET['route'] ?? 'accueil';

// on charge les catégories pour le menu sur toutes les pages
$categories = $categoryManager->selectAll();

// on va charger les modèles et les vues en fonction de la route
switch ($route) {

    case 'accueil':

        // on charge les articles pour la page d'accueil
        $articles = $articleManager->selectAllArticleHomepage();
        // vue de la base NON TWIG
        include PROJECT_DIRECTORY."/view/publicView/public.homepage.php";
        break;

    case 'categorie':

        // on vérifie si le slug de la catégorie est bien présent
        if(!isset($_GET['slug'])){
            include PROJECT_DIRECTORY."/view/publicView/public.404.php";
            exit;
        }
        // on charge la catégorie
        $category = $categoryManager->selectOneBySlug($_GET['slug']);
        // si la catégorie n'existe pas, on redirige vers la page 404
        if($category === null){
            include PROJECT_DIRECTORY."/view/publicView/public.404.php";
            exit;
        }
        // on charge les articles de la catégorie
        $articles = $articleManager->selectAllArticleByCategorySlug($_GET['slug']);
        // vue de la base NON TWIG
        include PROJECT_DIRECTORY."/view/publicView/public.category.php";

        break;

    case 'article':
        // on vérifie si le slug de l'article est bien présent
        if(!isset($_GET['slug'])){
            include PROJECT_DIRECTORY."/view/publicView/public.404.php";
            exit;
        }
        // on charge l'article
        $article = $articleManager->selectOneBySlug($_GET['slug']);
        // si l'article n'existe pas, on redirige vers la page 404
        if($article === null){
            include PROJECT_DIRECTORY."/view/publicView/public.404.php";
            exit;
        }
        // on charge les commentaires de l'article
        $comments = $commentManager->selectAllByIDArticle($article->getArticleId());
        // vue de la base NON TWIG
        include PROJECT_DIRECTORY."/view/publicView/public.article.php";

        break;
    case 'tag':
        // on vérifie si le slug du tag est bien présent
        if(!isset($_GET['slug'])){
            include PROJECT_DIRECTORY."/view/publicView/public.404.php";
            exit;
        }
        // on charge le tag
        $tag = $tagManager->selectOneBySlug($_GET['slug']);
        // si le tag n'existe pas, on redirige vers la page 404
        if($tag === null){
            include PROJECT_DIRECTORY."/view/publicView/public.404.php";
            exit;
        }
        // on charge les articles du tag
        $articles = $articleManager->selectAllArticleByTagSlug($_GET['slug']);
        include PROJECT_DIRECTORY."/view/publicView/public.tag.php";
        break;
    case 'user':
        // on vérifie si le slug de l'utilisateur est bien présent
        if(!isset($_GET['slug'])){
            include PROJECT_DIRECTORY."/view/publicView/public.404.php";
            exit;
        }
        // on charge l'utilisateur
        $user = $userManager->selectOneBySlug($_GET['slug']);
        // si il n'existe pas, on redirige vers la page 404
        if($user === null){
            include PROJECT_DIRECTORY."/view/publicView/public.404.php";
            exit;
        }
        // on charge les articles de l'utilisateur
        $articles = $articleManager->selectAllArticleByUserId($user->getUserId());
        include PROJECT_DIRECTORY."/view/publicView/public.user.php";
        break;
    case '404':
        // vue de la base NON TWIG
        include PROJECT_DIRECTORY."/view/publicView/public.404.php";
        exit;
        break;
    default:
        include PROJECT_DIRECTORY."/view/publicView/public.404.php";
        exit;
        break;
}
