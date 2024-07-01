<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du ImageManager::insert()</title>
</head>
<body>
    <h1>Exemple du ImageManager::insert()</h1>
    <div>
        <?php
        require 'menu.image.view.php';
        if(isset($error)) echo "<h4>$error</h4>";
        ?>
    <h3>Insertion d'une image</h3>
    <form action="" method="post">
        <label for="image_url">Image</label> <br>
        <textarea name="image_url" id="image_url" cols="30" rows="10"></textarea> <br>
        <label for="image_description">Description</label> <br>
        <textarea name="image_description" id="image_description" cols="30" rows="10"></textarea> <br>
        <label for="image_type">Type</label> <br>
        <textarea name="image_type" id="image_type" cols="30" rows="10"></textarea> <br>
        <input type="submit" value="Envoyer">
    </form>

    </div>

</body>
</html>