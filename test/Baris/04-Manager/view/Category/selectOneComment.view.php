<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple du CategoryManager::selectOneCategoryt()</title>
</head>
<body>
<div class="container">
        <h1>Exemple de CategoryManager::selectOneCategory()</h1>
        <div>
            <?php require 'menu.comment.view.php'; ?>

            <?php if(is_null($selectOneCategory)): ?>
                <h3 class="error-message">Commentaire inexistant</h3>
            <?php else: ?>
                <div class="comment-details">
                    <h4>ID : <?= $selectOneCategory->getCategoryId() ?> 
                        <a href="?view=<?= $selectOneCategory->getCategoryId() ?>">Voir ce commentaire via son id</a>
                    </h4>
                    <p><strong>Slug :</strong> <?= $selectOneCategory->getCategorySlug() ?></p>
                    <p><strong>Description :</strong> <?= $selectOneCategory->getCategoryDescription() ?></p>
                </div>
                <hr>
                <form action="" method="post">
                    <label for="category_id">ID</label>
                    <input type="text" name="category_id" id="category_id" value="<?= htmlspecialchars($selectOneCategory->getCategoryId()) ?>" readonly>

                    <label for="category_slug">Lien</label>
                    <input type="text" name="category_slug" id="category_slug" value="<?= htmlspecialchars($selectOneCategory->getCategorySlug()) ?>">

                    <label for="category_name">Nom</label>
                    <input type="text" name="category_name" id="category_name" value="<?= htmlspecialchars($selectOneCategory->getCategoryName()) ?>">

                    <label for="category_description">Description</label>
                    <textarea name="category_description" id="category_description" cols="30" rows="10"><?= htmlspecialchars($selectOneCategory->getCategoryDescription()) ?></textarea>

                    <input type="submit" value="Mettre à jour">
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>