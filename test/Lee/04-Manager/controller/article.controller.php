<?php

use model\Manager\ArticleManager;
use model\Mapping\ArticleMapping;

$articleManager = new ArticleManager($dbConnect);

$selectAllArticles = $articleManager->selectAll();
require ('../view/article/SelectAllArticle.php');