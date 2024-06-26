<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du fileManager::selectOneFile()</title>
</head>
<body>
    <h1>Exemple du fileManager::selectOneFile()</h1>
    <div>
        <?php

        require 'menu.file.view.php';

        if(is_null($selectOneFile)):
        ?>
        <h3>file inexistant</h3>
        
        <?php
    else:
        ?>
    <h4>ID : <?=$selectOneFile->getFileId()?> <a href="?view=<?=$selectOneFile->getFileId()?>">Voir ce file via son id</a></h4>
    <p><?=$selectOneFile->getFileUrl()?></p>
    
        <?php
    endif;
        ?>
    </div>
    
    <?php

    ?>
</body>
</html>