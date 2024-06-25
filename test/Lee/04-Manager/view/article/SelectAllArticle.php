<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Exemple du ArticleManager::selectAll()</title>
</head>
<body>
    <h1>Exemple du ArticleManager::selectAll()</h1>
    <div>
        <?php
        require 'menu.article.view.php';

        if(is_null($selectAllArticles)):
        ?>
        <h3>Pas encore de commentaire !</h3>
        <?php
    else:
        foreach($selectAllArticles as $arts):
        ?>
        <?php /*
    <h4>ID : <?=$item->getCommentId()?> <a href="?view=<?=$item->getCommentId()?>">Voir ce commentaire via son id</a> | <a href="?update=<?=$item->getCommentId()?>">Mettre à jour</a> | <a href="?delete=<?=$item->getCommentId()?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">Supprimer</a> </h4>
    <p><?=$item->getCommentText()?></p>
    <p><?=$item->getCommentDateCreate()?></p><hr>
     */  ?>
        <?php
        endforeach;
    endif;
        ?>
    </div>

</body>