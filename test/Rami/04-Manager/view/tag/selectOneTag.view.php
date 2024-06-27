<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du TagManager::selectOneTag()</title>
</head>
<body>
    <h1>Exemple du TagManager::selectOneTag()</h1>
    <div>
        <?php

        require 'menu.tag.view.php';

        if(is_null($selectOneTag)):
        ?>
        <h3>Tagaire inexistant</h3>
        
        <?php
    else:
        ?>
    <h4>ID : <?=$selectOneTag->getTagId()?> <a href="?view=<?=$selectOneTag->getTagId()?>">Voir ce Tag via son id</a></h4>
    <p><?=$selectOneTag->getTagSlug()?></p>
   
        <?php
    endif;
        ?>
    </div>
    
    <?php
var_dump($dbConnect,$TagManager,$selectOneTag);
    ?>
</body>
</html>