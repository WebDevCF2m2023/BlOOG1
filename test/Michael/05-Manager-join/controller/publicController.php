<?php

use model\Mapping\ArticleMapping;
use model\Manager\ArticleManager;

// Instanciation de la classe ArticleManager
$articleManager = new ArticleManager($dbConnect);

// Appel de la méthode selectAll
$articles = $articleManager->selectAll();
// Appel de la méthode selectAllArticleHomepage
$articlesHomepage = $articleManager->selectAllArticleHomepage();

echo "<h1>Instance de ArticleManager</h1>";
var_dump($articleManager);
echo "<h2>ArticleManager::selectAll()</h2>";
var_dump($articles);
echo "<h2>ArticleManager::selectAllArticleHomepage()</h2>";
var_dump($articlesHomepage);
foreach ($articlesHomepage as $article) {
    echo "<hr><h2>Article</h2>";
    echo "<p>Article ID: " . $article->getArticleId() . "</p>";
    echo "<p>Article Title: " . $article->getArticleTitle() . "</p>";
    echo "<p>Article Slug: " . $article->getArticleSlug() . "</p>";
    echo "<p>Article Text: " . $article->getArticleText() . "</p>";
    echo "<h4>User</h4>";
    echo "<p>Article User ID: " . $article->getUser()->getUserId() . "</p>";
    echo "<p>Article User Login: " . $article->getUser()->getUserLogin() . "</p>";
    echo "<p>Article User Full Name: " . $article->getUser()->getUserFullName() . "</p>";
    if ($article->getCategories() !== null):
        echo "<h4>Categories</h4>";
        foreach ($article->getCategories() as $category):
            echo "<p>Article Category ID: " . $category->getCategoryId() . "</p>";
            echo "<p>Article Category Name: " . $category->getCategoryName() . "</p>";
            echo "<p>Article Category Slug: " . $category->getCategorySlug() . "</p>";

        endforeach;
    endif;
    if ($article->getTags() !== null):
        echo "<h4>Tags</h4>";
        foreach ($article->getTags()as $tag):
            echo "<p>Article Tag Slug: " . $tag->getTagSlug() . "</p>";
        endforeach;
    endif;


    }
