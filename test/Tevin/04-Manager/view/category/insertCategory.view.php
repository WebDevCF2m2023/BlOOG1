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
        var_dump($_POST);
        ?>
    <h3>Insertion d'une categorie</h3>
    <form action="" method="post">
        <label for="category_name">Nom de la categorie</label>
        <input name="category_name" id="category_name">

        <label for="category_slug">Slug de la categorie</label>
        <input name="category_slug" id="category_slug">

        <label for="category_description">Description de la catégorie</label>
        <input name="category_description" id="category_description">
        <button type="submit" value="Envoyer">Envoyer</button>
    </form>

    </div>

</body>
</html>