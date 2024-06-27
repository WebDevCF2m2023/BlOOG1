<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du TagManager::insert()</title>
</head>
<body>
    <h1>Exemple du TAGManager::insert()</h1>
    <div>
        <?php
        require 'menu.tag.view.php';
        if(isset($error)) echo "<h4>$error</h4>";
        ?>
    <h3>Insertion d'un tag</h3>
    <form action="" method="post">
        <label for="tag_slug">Tag</label>
        <textarea name="tag_slug" id="tag_id" cols="30" rows="10"></textarea>
        <input type="submit" value="Envoyer">
    </form>

    </div>

</body>
</html>