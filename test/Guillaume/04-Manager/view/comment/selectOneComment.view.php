<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CommentManager::selectOneComment()</title>
</head>
<body>
    <h1>Exemple du CommentManager::selectOneComment()</h1>
    <div>
        <?php

        require 'menu.comment.view.php';

        if(is_null($selectOneComment)):
        ?>
        <h3>Commentaire inexistant</h3>
        
        <?php
    else:
        ?>
    <h4>ID : <?=$selectOneComment->getCommentId()?> <a href="?view=<?=$selectOneComment->getCommentId()?>">Voir ce commentaire via son id</a></h4>
    <p><?=$selectOneComment->getCommentText()?></p>
    <p><?=$selectOneComment->getCommentDateCreate()?></p><hr>
        <?php
    endif;
        ?>
    </div>
    
</body>
</html>