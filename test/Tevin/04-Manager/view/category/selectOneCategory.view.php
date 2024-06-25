<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CategoryManager::selectOneCategory()</title>
</head>
<body>
    <h1>Exemple du CategoryManager::selectOneCategory()</h1>
    <div>
        <?php

        require 'menu.category.view.php';

        if(is_null($selectOneCategory)):
        ?>
        <h3>Categorie inexistante</h3>
        
        <?php
    else:
        ?>
    <h4>ID : <?=$selectOneComment->getCategoryId()?> <a href="?view=<?=$selectOneComment->getCategoryId()?>">Voir ce commentaire via son id</a></h4>
    <p><?=$selectOneComment->getCategoryText()?></p>
    <p><?=$selectOneComment->getCategoryDateCreate()?></p><hr>
        <?php
    endif;
        ?>
    </div>
    
    <?php
var_dump($dbConnect,$categoryManager,$selectOneCategory);
    ?>
</body>
</html>