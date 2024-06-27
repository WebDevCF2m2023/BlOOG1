<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du TagManager::selectAll()</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Exemple du TagManager::selectAll()</h1>
    <div>
        <?php
        require 'menu.tag.view.php';

        if (is_null($selectAllTag)) :void
        ?>
            <h3>Pas encore de tag !</h3>
            <?php
        else :
            foreach ($selectAllTag as $item) :
            ?>
                <h4>ID : <?= $item->getTagId() ?> <a href="?view=<?= $item->getTagId() ?>">Voir ce commentaire via son id</a> | <a href="?update=<?= $item->getTagId() ?>">Mettre à jour</a> | <a href="?delete=<?= $item->getTagId() ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">Supprimer</a> | voir les articles (juste le titre et 200 caractères) utilisant cet tag </h4>
                <p><?= $item->getTagSlug() ?></p>
                
                <hr>
        <?php
            endforeach;
        endif;
        ?>
    </div>

</body>

</html>