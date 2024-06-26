<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du fileManager::update()</title>
</head>
<body>
    <h1>Exemple du fileManager::update()</h1>
    <div>
        <?php
        require 'menu.file.view.php';
        if(is_null($selectOneFile)):
            ?>
            <h3>file inexistant</h3>

        <?php
        else:
        if(isset($error)) echo "<h4>$error</h4>";
        ?>
    <h3>Modification d'un file</h3>
    <form action="" method="post">
        <label for="file_text">file</label>
        <textarea name="file_url" id="file_text" cols="30" rows="10"><?=$selectOneFile->getFileUrl()?></textarea>
        <input type="submit" value="Envoyer">
    </form>
        <?php
        endif;
        ?>

    </div>

</body>
</html>