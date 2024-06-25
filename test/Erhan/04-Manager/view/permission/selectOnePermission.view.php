<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permission Seul</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.css">
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
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?=$selectOnePermission->getPermissionId()?> </th>
                    <td><?=$selectOnePermission->getPermissionName()?></td>
                    <td><?=$selectOnePermission->getPermissionDescription()?></td>
                </tr>
            </tbody>
        </table>
        <?php
    endif;
        ?>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.js"></script>
</body>
</html>