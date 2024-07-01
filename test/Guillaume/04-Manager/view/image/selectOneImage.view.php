<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du ImageManager::selectOneImage()</title>
</head>
<body>
    <h1>Exemple du ImageManager::selectOneImage()</h1>
    <div>
        <?php

        require 'menu.image.view.php';

        if(is_null($selectOneImage)):
        ?>
        <h3>Image inexistante</h3>
        
        <?php
    else:
        ?>
    <h4>ID : <?=$selectOneImage->getImageId()?> <a href="?view=<?=$selectOneImage->getImageId()?>">Voir cette image via son id</a></h4>
    <h6>Url de l'image:</h6>
    <p><?=$selectOneImage->getImageUrlName()?></p>
    <h6>Description:</h6>
    <p><?=$selectOneImage->getImageDescription()?></p>
    <h6>Type:</h6>
    <p><?=$selectOneImage->getImageType()?></p><hr>
        <?php
    endif;
        ?>
    </div>
    
</body>
</html>