<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CategoryManager::insert()</title>
</head>
<body>
    <h1>Exemple du CategoryManager::insert()</h1>
    <div>
        <?php
        require 'menu.category.view.php';
        if(isset($error)) echo "<h4>$error</h4>";
        ?>
    <h3>Insertion d'une categorie</h3>
    <form action="" method="post">
        <label for="category_text">Commentaire</label>
        <textarea name="category_text" id="category_text" cols="30" rows="10"></textarea>
        <input type="submit" value="Envoyer">
    </form>

    </div>

</body>
</html>