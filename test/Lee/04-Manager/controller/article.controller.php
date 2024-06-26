<?php

use model\Manager\ArticleManager;
use model\Mapping\ArticleMapping;

$articleManager = new ArticleManager($dbConnect);


if(isset($_GET['action']) 
&& ($_GET['action'] == "delete")
        && ctype_digit($_GET["id"])
        ){
            $idArticle = (int) $_GET['id'];
            // delete comment
            $deleteArticle = $articleManager->delete($idArticle);
            if($deleteArticle===true) {
                header("Location: ?article");
                exit();
            }else{
                $error = $deleteArticle;
            }
            
        }else if (isset($_GET["action"])
        && ($_GET["action"] == "update")
        && ctype_digit($_GET["id"])
        ){
            $artId = $_GET["id"];
            $selectOneArticle = $articleManager->selectOneById($artId);
            $title = "ArticleManager::selectOneArticle()";
            require ("../view/article/selectOneArticle.view.php");
            die();
        }

$title = "ArticleManager::selectAll()";
$selectAllArticles = $articleManager->selectAll();
require ('../view/article/SelectAllArticle.php');