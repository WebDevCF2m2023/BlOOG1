<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du TagManager::update()</title>
</head>
<body>
    <h1>Exemple du TagManager::update()</h1>
    <div>
        <?php
        require 'menu.tag.view.php';
        if(is_null($selectOneTag)):
            ?>
            <h3>Tag inexistant</h3>

        <?php
        else:
        if(isset($error)) echo "<h4>$error</h4>";
        ?>
    <h3>Modification d'un tag</h3>
    <form action="" method="post">
        <label for="tag_slug">Tag</label>
        <textarea name="tag_slug" id="tag_slug" cols="30" rows="10"><?=$selectOneTag->getTagSlug()?></textarea>
        <input type="submit" value="Envoyer">
    </form>
        <?php
        endif;
        ?>

    </div>

</body>
</html>