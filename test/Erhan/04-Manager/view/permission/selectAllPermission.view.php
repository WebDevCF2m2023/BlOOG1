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
    <h3>Pas encore de Permission!</h3>
    <?php
else:
    ?>

    <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">View</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody class="text-center">
            <?php
    foreach($selectAllPermissions as $item):
    ?>

            
            <tr>
                <th scope="row"><?=$item->getPermissionId()?></th>
                <td><?=$item->getPermissionName()?></td>
                <td><?=$item->getPermissionDescription()?></td>
                <td><a href="?view=<?=$item->getPermissionId()?>"><i class="bi bi-bookmark-plus"></i></a></td>
                <td><a href="?update=<?=$item->getPermissionId()?>"><i class="bi bi-bookmark-plus"></i></a></td>
                <td><a href="?delete=<?=$item->getPermissionId()?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');"><i class="bi bi-dash-circle text-danger"></i></a></td>
            </tr>
        </tbody>
    </table>

    <?php
    endforeach;
    endif;
    ?>
    
</body>
</html>