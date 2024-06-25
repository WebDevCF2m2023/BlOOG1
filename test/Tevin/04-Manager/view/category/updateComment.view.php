<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CategoryManager::update()</title>
</head>
<body>
    <h1>Exemple du CategoryManager::update()</h1>
    <div>
        <?php
        require 'menu.category.view.php';
        if(is_null($selectOneCategory)):
            ?>
            <h3>Categorie inexistante</h3>

        <?php
        else:
        if(isset($error)) echo "<h4>$error</h4>";
        ?>
    <h3>Modification d'une categorie</h3>
    <form action="" method="post">
        <label for="category_text">Categorie</label>
        <textarea name="category_text" id="category_text" cols="30" rows="10"><?=$selectOneCategory->getCategoryText()?></textarea>
        <input type="submit" value="Envoyer">
    </form>
        <?php
        endif;
        ?>

    </div>

</body>
</html>