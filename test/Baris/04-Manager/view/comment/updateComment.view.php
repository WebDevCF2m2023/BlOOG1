<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CommentManager::update()</title>
</head>
<body>
    <h1>Exemple du CommentManager::update()</h1>
    <div>
        <?php
        require 'menu.comment.view.php';
        if(is_null($selectOneCategory)):
            ?>
            <h3>Commentaire inexistant</h3>

        <?php
        else:
        if(isset($error)) echo "<h4>$error</h4>";
        var_dump($selectOneCategory);
        ?>
    <h3>Modification d'un commentaire</h3>
    <form action="" method="post">
        <label for="comment_text">Commentaire</label>
        <textarea name="comment_text" id="comment_text" cols="30" rows="10"><?=$selectOneCategory->getCategoryDescription()?></textarea>
        <input type="submit" value="Envoyer">
    </form>
        <?php
        endif;
        ?>

    </div>

</body>
</html>