<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du ImageManager::selectAll()</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Exemple du ImageManager::selectAll()</h1>
    <div>
        <?php
        require 'menu.image.view.php';

        if(is_null($selectAllImages)):
        ?>
        <h3>Pas encore d'images !</h3>
        <?php
    else:
        foreach($selectAllImages as $item):
        ?>
    <h4>ID : <?=$item->getImageId()?> <a href="?viewImg=<?=$item->getImageId()?>">Voir cette image via son id</a> | <a href="?deleteImg=<?=$item->getImageId()?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette image ?');">Supprimer</a> | <a href="?updateImg=<?=$item->getImageId()?>" onclick="return confirm('Êtes-vous sûr de vouloir mettre à jour cette image ?');">Mise à jour</a> </h4>
    <p><?=$item->getImageUrlName()?></p>
        <?php
        endforeach;
    endif;
        ?>
    </div>

</body>
</html>