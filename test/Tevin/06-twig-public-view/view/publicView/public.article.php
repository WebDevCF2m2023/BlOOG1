<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Bloog 1 | <?=$article->getArticleTitle()?></title>
</head>
<body>
    <h1>Bloog 1 | <?=$article->getArticleTitle()?></h1>
    <?php
    require 'public.menu.php';
    ?>
    <h2>Les derniers articles</h2>

            <article>
                <h3><?= $article->getArticleTitle() ?></h3>
                <p>Categories:
                    <?php
                    if(is_null($article->getCategories())):
                        ?>
                        Aucune catégorie !
                    <?php
                    else:
                        foreach ($article->getCategories() as $categorie):
                            ?>

                            <a href=".?route=categorie&slug=<?= $categorie->getCategorySlug()?>"><?= $categorie->getCategoryName() ?></a>
                        <?php
                        endforeach;
                    endif;
                    ?><hr>
                </p>
                <p><?= nl2br($article->getArticleText()) ?></p>
                <p>Publié le <?= $article->getArticleDatePublish() ?> par <?= $article->getUser()->getUserFullName() ?></p>
                <hr>
                <p>Tags:
                    <?php
                    if(is_null($article->getTags())):
                        ?>
                        Aucun tag !
                    <?php
                    else:
                    foreach ($article->getTags() as $tags):
                        ?>

                        <a href=".?route=tag&slug=<?= $tags->getTagSlug()?>"><?= $tags->getTagSlug() ?></a>
            <?php
            endforeach;
            endif;
            ?><hr>
                </p>
                <?php if(is_null($comments)): ?>
                    <h4>Aucun commentaire n'a été trouvé</h4>
                <?php else:
                $nbComments = count($comments);
                ?>

                <h4>Commentaire<?php if($nbComments >1)echo "s";?> (<?=$nbComments?>) </h4>
                <?php
                    foreach ($comments as $comment):
                ?>
                         <h5><?= $comment->getUser()->getUserFullName() ?></h5>
                        <p><?= $comment->getCommentText() ?></p>
                        <p>Publié le <?= $comment->getCommentDateCreate() ?></p>
                        <hr>
                <?php
                    endforeach;
                endif;
                ?>
            </article>

</body>
</html>
