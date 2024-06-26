<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CategoryManager::selectAll()</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Exemple du CategoryManager::selectAll()</h1>
    <div>
        <?php
        require 'menu.category.view.php';

        if(is_null($selectAllCategories)):
        ?>
        <h3>Pas encore de categorie !</h3>
        <?php
    else:
        foreach($selectAllCategories as $item):
        ?>
    <h4>ID : <?=$item->getCategoryId()?> <a href="?view=<?=$item->getCategoryId()?>">Voir ce commentaire via son id</a> | <a href="?update=<?=$item->getCategoryId()?>">Mettre à jour</a> | <a href="?delete=<?=$item->getCategoryId()?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette category ?');">Supprimer</a> </h4>
    <p><?=$item->getCategoryName()?></p>
    <p><?=$item->getCategoryDescription()?></p><hr>
        <?php
        endforeach;
    endif;
        ?>
    </div>

</body>
</html>