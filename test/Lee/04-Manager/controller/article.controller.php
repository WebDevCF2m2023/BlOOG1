<?php

use model\Manager\ArticleManager;
use model\Mapping\ArticleMapping;

$articleManager = new ArticleManager($dbConnect);


if(isset($_POST['artTitle'], $_POST["artText"])) {
 $artTitle = htmlspecialchars(trim(strip_tags($_POST["artTitle"])), ENT_QUOTES);
 $artText  = htmlspecialchars(trim(strip_tags($_POST["artText"])), ENT_QUOTES);

    try{

        $article = new ArticleMapping($_POST);
        $article->setArticleTitle($artTitle);
        $article->setArticleSlug($artTitle);
        $article->setArticleText($artText);
        $article->setArticleDatePublish(new DateTime());
        $insertArticle = $articleManager->insert($article);

        if($insertArticle===true) {
            header("Location: ?article");
            exit();
        }else{
            $error = $insertArticle;
        }
    }catch(Exception $e){
        $error = $e->getMessage();
    }

}

if(isset($_POST['artTitleUpdate'], 
         $_POST["artTextUpdate"]
        ) && ctype_digit($_POST["artId"])) {
    $artId    = $_POST["artId"];
    $artTitle = htmlspecialchars(trim(strip_tags($_POST["artTitleUpdate"])), ENT_QUOTES);
    $artText  = htmlspecialchars(trim(strip_tags($_POST["artTextUpdate"])), ENT_QUOTES);
 
       try{
   
           $article = new ArticleMapping($_POST);
           $article->setArticleId($artId);
           $article->setArticleTitle($artTitle);
           $article->setArticleSlug($artTitle);
           $article->setArticleText($artText);
           $article->setArticleDateUpdate(new DateTime());
           $updateArticle = $articleManager->update($article);
   
           if($updateArticle===true) {
               header("Location: ?article");
               exit();
           }else{
               $error = $updateArticle;
           }
       }catch(Exception $e){
           $error = $e->getMessage();
       }
    }
if(isset($_POST["artTextUpdate"],
         $_POST["artIdUpdate"]
         ) &&
         ctype_digit($_POST["artIdUpdate"])
         ) {
            $artTitle = htmlspecialchars(trim(strip_tags($_POST["artTitle"])), ENT_QUOTES);
            $artText  = htmlspecialchars(trim(strip_tags($_POST["artText"])), ENT_QUOTES);
           
            $article = new ArticleMapping($_POST);
            $article->setArticleTitle($artTitle);
            $article->setArticleSlug($artTitle);
            $article->setArticleText($artText);
            $article->setArticleDatePublish(new DateTime());
            $insertArticle = $articleManager->insert($article);
         }

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
            require ("../view/article/selectOneUpdate.view.php");
            die();
        }else if (isset($_GET["action"])
                && $_GET["action"] === "insert"
                ) {
                    $title = "ArticleManager::insert()";
                    include("../view/article/addArticle.view.php");
                }

$title = "ArticleManager::selectAll()";
$selectAllArticles = $articleManager->selectAll();
require ('../view/article/SelectAllArticle.php');