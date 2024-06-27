<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CommentManager::selectAll()</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Exemple du CategoryManager::selectAll()</h1>
    <div>
        <?php
        require 'menu.comment.view.php';

        if(is_null($selectAllCategoryManager)):
        ?>
        <h3>Pas encore de commentaire !</h3>
        <?php
    else:
        foreach($selectAllCategoryManager as $item):
        ?>
    <h4>ID : <?=$item->getCategoryId()?> <a href="?view=<?=$item->getcategoryId()?>">voire cette catégorie </a> | <a href="?update=<?=$item->getCategoryId()?>">Mettre à jour</a> | <a href="?delete=<?=$item->getCategoryId()?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">Supprimer</a> </h4>
    <p><?=$item->getCategorySlug ()?></p>
    <p><?=$item->getCategoryDescription()?></p><hr>
        <?php
        endforeach;
    endif;
        ?>
    </div>

</body>
</html>