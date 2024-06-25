<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permissions</title>
</head>
<body>
<?php
    require 'menu.comment.view.php';

    if(is_null($selectAllPermissions)):
    ?>
    <h3>Pas encore de commentaire !</h3>
    <?php
else:
    foreach($selectAllPermissions as $item):
    ?>
    <h4>ID : <?=$item->getPermissionId()?> 
    <a href="?view=<?=$item->getPermissionId()?>">Voir ce commentaire via son id</a> | 
    <a href="?update=<?=$item->getPermissionId()?>">Mettre à jour</a> | 
    <a href="?delete=<?=$item->getPermissionId()?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">Supprimer</a> </h4>
    <p><?=$item->getPermissionName()?></p>
    <p><?=$item->getPermissionDescription()?></p><hr>
    <?php
    endforeach;
    endif;
    ?>
    
</body>
</html>