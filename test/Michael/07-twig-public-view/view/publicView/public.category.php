<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=$root?>css/style.css">
    <title>Bloog 1 | Catégorie | <?=$category->getCategoryName()?></title>
</head>
<body>
    <h1>Bloog 1 | Catégorie | <?=$category->getCategoryName()?></h1>
    <?php
    require 'public.menu.php';
    ?>
    <h2>Description : </h2>
    <p><?=$category->getCategoryDescription()?> ici</p>
    <h2>Articles : </h2>
    <?php
    if($articles === null):
    ?>
    <h3>Aucun article n'a été trouvé</h3>
    <?php
    else:
        //var_dump($articles);
        foreach ($articles as $article):
            ?>
            <article>
                <h3><a href="<?=$root?>article/<?= $article->getArticleSlug() ?>"><?= $article->getArticleTitle() ?></a></h3>
                <p><?= $article->getArticleText() ?> <a href="<?=$root?>article/<?= $article->getArticleSlug() ?>"> ... Lire la suite</a></p>
                <p>Publié le <?= $article->getArticleDatePublish() ?> par <a href="<?=$root."user/".$article->getUser()->getUserLogin()?>"><?= $article->getUser()->getUserFullName() ?></a></p>
                <p>Categories:
                    <?php
                    if(is_null($article->getCategories())):
                        ?>
                        Aucune catégorie !
                    <?php
                    else:
                        foreach ($article->getCategories() as $categorie):
                            ?>

                            <a href="<?=$root?>categorie/<?= $categorie->getCategorySlug()?>"><?= $categorie->getCategoryName() ?></a>
                        <?php
                        endforeach;
                    endif;
                    ?>
                </p>
                <p>Nombre de commentaires: <?= $article->getCommentCount() ?></p>
                <hr>
            </article>
            <?php
        endforeach;
    endif;
    ?>

</body>
</html>
