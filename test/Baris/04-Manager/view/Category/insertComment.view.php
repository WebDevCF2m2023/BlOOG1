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
        require 'menu.comment.view.php';
        if(isset($error)) echo "<h4>$error</h4>";
        var_dump($_POST)
        ?>
    <h3>Insertion d'une category</h3>

    <form action="" method="post">
    <label for="category_slug">Lien</label>
    <input type="text" name="category_slug" id="category_slug" placeholder="Entrer le lien">

    <label for="category_name">Nom</label>
    <input type="text" name="category_name" id="category_name" placeholder="Entrer le nom">

    <label for="category_description">Description</label>
    <textarea name="category_description" id="category_description" cols="30" rows="10" placeholder="Entrer la description"></textarea>
    
    <input type="submit" value="Envoyer">
     </form>
 </div>

</body>
</html>