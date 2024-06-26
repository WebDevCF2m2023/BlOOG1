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