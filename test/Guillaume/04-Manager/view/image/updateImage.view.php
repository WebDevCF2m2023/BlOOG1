<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du ImageManager::update()</title>
</head>
<body>
    <h1>Exemple du ImageManager::update()</h1>
    <div>
        <?php
        require 'menu.image.view.php';
        if(is_null($selectOneImage)):
            ?>
            <h3>Image inexistante</h3>

        <?php
        else:
        if(isset($error)) echo "<h4>$error</h4>";
        ?>
    <h3>Modification d'une image</h3>
    <form action="" method="post">
    <label for="image_id">ID</label> <br>
        <input type="text" name="image_id" value="<?=$selectOneImage->getImageId()?>"> <br>
        <label for="image_url">Image</label> <br>
        <textarea name="image_url" id="image_url" cols="30" rows="10"><?=$selectOneImage->getImageUrlName()?></textarea> <br>
        <label for="image_description">Description</label> <br>
        <textarea name="image_description" id="image_description" cols="30" rows="10"><?=$selectOneImage->getImageDescription()?></textarea> <br>
        <label for="image_type">Type</label> <br>
        <textarea name="image_type" id="image_type" cols="30" rows="10"><?=$selectOneImage->getImageType()?></textarea> <br>
        <input type="submit" value="Envoyer">
    </form>
        <?php
        endif;
        ?>

    </div>

</body>
</html>