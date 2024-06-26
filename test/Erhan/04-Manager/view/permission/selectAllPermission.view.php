<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permissions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.4/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
<div class="container">
    <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Détail</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody class="text-center">
            <?php
    foreach($selectAllPermissions as $item):
    ?>
            <tr>
                <td><?=$item->getPermissionId()?></td>
                <td><?=$item->getPermissionName()?></td>
                <td><?=$item->getPermissionDescription()?></td>
                <td><a href="?view=<?=$item->getPermissionId()?>"><i class="bi bi-eye-fill"></i></a></td>
                <td><a href="?update=<?=$item->getPermissionId()?>"><i class="bi bi-bookmark-plus"></i></a></td>
                <td><a href="?delete=<?=$item->getPermissionId()?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');"><i class="bi bi-dash-circle text-danger"></i></a></td>
            </tr>
            <?php
    endforeach;?>
        </tbody>
    </table>
    <?php    
    endif;
    ?>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.28.0/tableExport.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.4/dist/bootstrap-table.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.4/dist/bootstrap-table-locale-all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.4/dist/extensions/export/bootstrap-table-export.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/locale/bootstrap-table-fr-FR.min.js"></script>
</body>
</html>