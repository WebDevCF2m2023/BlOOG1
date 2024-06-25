<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permission Seul</title>
</head>
<body>

<?php

        require 'menu.comment.view.php';

        if(is_null($selectOnePermission)):
        ?>
        <h3>Permission inexistant</h3>
        
        <?php
    else:
        ?>
    <h4>ID : <?=$selectOnePermission->getPermissionId()?> 
    <a href="?view=<?=$selectOnePermission->getPermissionId()?>">Voir ce commentaire via son id</a></h4>
    <p><?=$selectOnePermission->getPermissionName()?></p>
    <p><?=$selectOnePermission->getPermissionDescription()?></p><hr>
        <?php
    endif;
        ?>
    
</body>
</html>