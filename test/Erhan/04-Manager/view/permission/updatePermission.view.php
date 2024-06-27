<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Permission</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
    require 'menu.comment.view.php';
    if(is_null($selectOnePermission)):
        ?>
        <h3>Permission inexistant</h3>

    <?php
    else:
    if(isset($error)) echo "<h4>$error</h4>";
    ?>
    
    <form method="POST" >
        <div class="container border-end border-bottom border-primary rounded-5 p-4">
        <div class="row mb-4">
            <div class="col">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="form3Example1">Permission Nom</label>
                    <input type="text"  class="form-control" name="permission_name" value="<?=$selectOnePermission->getPermissionName()?>"/>
                </div>
            </div>
            <div class="col">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="form3Example2">Permission Description</label>
                    <input type="text" name="permission_description" class="form-control" value="<?=$selectOnePermission->getPermissionDescription()?>" />
                </div>
            </div>
        </div>
        <div class="text-center">
            <button data-mdb-ripple-init type="submit" class="btn btn-outline-primary btn-rounded mb-4">Update</button>
        </div>        
    </form>

    <?php
    endif;
    ?>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>