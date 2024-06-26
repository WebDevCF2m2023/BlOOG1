<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du FileManager::selectAll()</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Exemple du FileManager::selectAll()</h1>
    <div>
        <?php
        require 'menu.file.view.php';

        if(is_null($selectAllFiles)):
        ?>
        <h3>Pas encore de File !</h3>
        <?php
    else:
        foreach($selectAllFiles as $item):
        ?>
    <h4>ID : <?=$item->getFileId()?> <a href="?view=<?=$item->getFileId()?>">Voir ce File via son id</a> | <a href="?update=<?=$item->getFileId()?>">Mettre à jour</a> | <a href="?delete=<?=$item->getFileId()?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce File ?');">Supprimer</a> </h4>
    <p><?=$item->getFileDescription()?></p>
    <p><?=$item->getFileUrl()?></p><hr>
        <?php
        endforeach;
    endif;
        ?>
    </div>

</body>
</html>