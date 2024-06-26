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
    <h4>ID : <?=$selectOneComment->getImageId()?> <a href="?view=<?=$selectOneComment->getImageId()?>">Voir cette image via son id</a></h4>
    <p><?=$selectOneImage->getImageUrlName()?></p>
    <p><?=$selectOneImage->getImageDateCreate()?></p><hr>
        <?php
    endif;
        ?>
    </div>
    
    <?php
var_dump($dbConnect,$imageManager,$selectOneImage);
    ?>
</body>
</html>