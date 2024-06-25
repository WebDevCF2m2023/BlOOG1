<?php 

// J'EN AVAIS MARRE DE VOIS CEUX-CI DANS L'INDEX



// on va utiliser notre manager de commentaires
use model\Manager\CommentManager;

// on va utiliser notre classe de mapping de commentaires
use model\Mapping\CommentMapping;


$commentManager = new CommentManager($dbConnect);

// detail view
if(isset($_GET['view'])&&ctype_digit($_GET['view'])){
    $idComment = (int) $_GET['view'];
    // select one comment
    $selectOneComment = $commentManager->selectOneById($idComment);
    // view
    require "../view/comment/selectOneComment.view.php";

// insert comment page
}elseif(isset($_GET['insert'])){

// real insert comment
    if(isset($_POST['comment_text'])) {
        try{
            // create comment
            $comment = new CommentMapping($_POST);
            // set date
            $comment->setCommentDatePublish(new DateTime());
            // insert comment
            $insertComment = $commentManager->insert($comment);

            if($insertComment===true) {
                header("Location: ./");
                exit();
            }else{
                $error = $insertComment;
            }
        }catch(Exception $e){
            $error = $e->getMessage();
        }
        //var_dump($comment);

    }
    // view
    require "../view/comment/insertComment.view.php";

// delete comment
}elseif (isset($_GET['update'])&&ctype_digit($_GET['update'])) {
    $idComment = (int)$_GET['update'];

    // update comment
    if (isset($_POST['comment_text'])) {
        try {
            // create comment
            $comment = new CommentMapping($_POST);
            $comment->setCommentId($idComment);
            // update comment
            $updateComment = $commentManager->update($comment);
            if($updateComment===true) {
                header("Location: ./");
                exit();
            }else{
                $error = $updateComment;
            }
        }catch (Exception $e) {
            $error = $e->getMessage();
        }

    }
    // select one comment
    $selectOneComment = $commentManager->selectOneById($idComment);
    // view
    require "../view/comment/updateComment.view.php";

// delete comment
}elseif(isset($_GET['delete'])&&ctype_digit($_GET['delete'])){
    $idComment = (int) $_GET['delete'];
    // delete comment
    $deleteComment = $commentManager->delete($idComment);
    if($deleteComment===true) {
        header("Location: ./");
        exit();
    }else{
        $error = $deleteComment;
    }

// homepage
}else{
    // select all comments
    $selectAllComments = $commentManager->selectAll();
    // view
    require "../view/comment/selectAllComment.view.php";
}
