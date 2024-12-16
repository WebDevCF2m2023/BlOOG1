<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Bloog 1 | <?=$category->getCategoryName()?></title>
</head>
<body>
    <h1>Bloog 1 | <?=$category->getCategoryName()?></h1>
    <?php
    require 'public.menu.php';
    ?>
    <h2>Description : </h2>
    <p><?=$category->getCategoryDescription()?></p>
    <h2>Articles : </h2>
    <?php
    if($articles === null):
    ?>
    <h3>Aucun article n'a été trouvé</h3>
    <?php
    else:
        foreach ($articles as $article):
            ?>
            <article>
                <h3><a href="?route=article&slug=<?= $article->getArticleSlug() ?>"><?= $article->getArticleTitle() ?></a></h3>
                <p><?= $article->getArticleText() ?> <a href="?route=article&slug=<?= $article->getArticleSlug() ?>"> ... Lire la suite</a></p>
                <p>Publié le <?= $article->getArticleDatePublish() ?> par <?= $article->getUser()->getUserFullName() ?></p>

                <p>Nombre de commentaires: <?= $article->getCommentCount() ?></p>
                <hr>
            </article>
            <?php
        endforeach;
    endif;
    ?>

</body>
</html>
