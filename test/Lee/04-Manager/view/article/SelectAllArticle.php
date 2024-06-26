<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
    <title><?=$title?></title>
</head>
    <body>
        <?php require 'menu.article.view.php'; ?>
        <div class="flex justify-center">
            <p class="text-3xl mb-16">Exemple du ArticleManager::selectAll&lpar;&rpar;</p><p>&lpar;en utilisant Tailwind&rpar;</p></p>
        </div>
        <div class="flex justify-center w-4/6 m-auto">
            <?php include ("inc/allArticlesTable.inc.php") ?>
            </div>
    </body>
</html>