<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CommentManager::selectAll()</title>
</head>
<body>
    <h1>Exemple du CommentManager::selectAll()</h1>
    <div>
        <?php
        require 'menu.comment.view.php';

        if(is_null($selectComment)):
        ?>
        <h3>Pas encore de commentaire !</h3>
        <?php
    else:
        foreach($selectComment as $item):
        ?>
    <h4>ID : <?=$item->getCommentId()?> <a href="?view=<?=$item->getCommentId()?>">Voir ce commentaire via son id</a></h4>
    <p><?=$item->getCommentText()?></p>
    <p><?=$item->getCommentDateCreate()?></p><hr>
        <?php
        endforeach;
    endif;
        ?>
    </div>
    
    <?php
var_dump($dbConnect,$commentManager,$selectComment);
    ?>
</body>
</html>