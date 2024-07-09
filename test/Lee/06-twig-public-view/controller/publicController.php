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
// j'ai besoin de manager pour User aussi
$userManager = new UserManager($db);
// et le nouveau TagManager
$tagManager = new TagManager($db);

// si la route n'est pas définie, on affiche la page d'accueil
$route = $_GET['route'] ?? 'accueil';


// on charge les catégories pour le menu sur toutes les pages
$categories = $categoryManager->selectAll();

if (isset($_GET["select"])) {
    $subRoute = $_GET["select"]; // faut que j'applique sanitisation ici
    $slug = $_GET["id"];
    switch ($subRoute) {
        case "oneArt":

            $article = $articleManager->selectOneBySlug($slug);

            echo $twig->render("publicView/public.oneArt.view.twig", ["article" => $article]);
            break;
        case "oneAuthor":
            $author = $articleManager->selectArticlesForOneUser($id);

            echo $twig->render('publicView/public.oneAuthor.view.twig', ["authors" => $author ]);
            break;
        case "oneCat":
            $id = $_GET["id"];
            echo ($id. ' : Category');
            break;
        case "oneTag":
            $id = $_GET["id"];
            echo ($id. ' : Tag');
            break;
    }
}else {
switch ($route) {

    case 'accueil':

        // on charge les articles pour la page d'accueil
        $articles = $articleManager->selectAllArticleHomepage(1);
        $popular = $articleManager->selectAllArticleHomepage(1);
        $categories = $categoryManager->selectAll(3 );
        $tags = $tagManager->selectAll();
        // vue de la base NON TWIG // c'est TWIG mainenant :p
        echo $twig->render('publicView/public.homepage.view.twig', ['articles' => $articles, 'categories' => $categories, 'popular' => $popular, 'tags' => $tags]);
        break;

    case 'categorie':

        // on vérifie si le slug de la catégorie est bien présent
        if(!isset($_GET['slug'])){
            header('Location: ./');
            exit;
        }
        // on charge la catégorie
        $category = $categoryManager->selectOneBySlug($_GET['slug']);
        // si la catégorie n'existe pas, on redirige vers la page 404
        if($category === null){
            header('Location: ./?route=404');
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
            header('Location: ./');
            exit;
        }
        // on charge l'article
        $article = $articleManager->selectOneBySlug($_GET['slug']);
        // si l'article n'existe pas, on redirige vers la page 404
        if($article === null){
            header('Location: ./?route=404');
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
            header('Location: ./');
            exit;
        }

        echo "<h1>On affiche une nouvelle vue avec les articles qui ont ce tag</h1>";
        break;
    case 'author':
        $authors = $userManager->selectAllWithArtCount();

        echo $twig->render('publicView/public.author.view.twig', ['authors' => $authors]);
        break;
    case '404':
        echo $twig->render('publicView/public.404.view.twig');
        break;
    default:
        include PROJECT_DIRECTORY."/controller/publicController.php";
        break;
}
}