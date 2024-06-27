<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CatagoryManager::update()</title>
</head>
<body>
    <h1>Exemple du CategoryManager::update()</h1>
    <div>
        <?php
        require 'menu.comment.view.php';
        if(is_null($selectOneCategory)):
            ?>
            <h3>Category inexistant</h3>

        <?php
        else:
        if(isset($error)) echo "<h4>$error</h4>";
        var_dump($selectOneCategory);
        ?>
    <h3>Modification d'une category</h3>
    <form action="" method="post">
        <label for="category_name">Commentaire</label>
        <textarea name="category_description" id="category_description" cols="30" rows="10"><?=$selectOneCategory->getCategoryDescription()?></textarea>
        <input type="submit" value="Envoyer">
    </form>
        <?php
        endif;
        ?>

    </div>

</body>
</html>