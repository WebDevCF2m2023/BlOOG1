<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du FileManager::insert()</title>
</head>
<body>
    <h1>Exemple du FileManager::insert()</h1>
    <div>
        <?php
        require 'menu.file.view.php';
        if(isset($error)) echo "<h4>$error</h4>";
        ?>
    <h3>Insertion d'un File</h3>
    <form action="" method="post">
        <label for="file_text">File</label>
        <input name="file_text" id="file_text" cols="30" rows="10">
        <input type="submit" value="Envoyer">
    </form>

    </div>

</body>
</html>