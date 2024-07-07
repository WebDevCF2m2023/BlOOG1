<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Post - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
<body>
     <!-- Page content-->
     <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">Bloog 1 | Homepage</h1>
    <?php
    require 'public.menu.php';
    ?>
    <h2>Les derniers articles</h2>
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
                <p class="fs-5 mb-4"><?= $article->getArticleText() ?> <a href="?route=article&slug=<?= $article->getArticleSlug() ?>"> ... Lire la suite</a></p>
                <div class="text-muted fst-italic mb-2">Publié le <?= $article->getArticleDatePublish() ?> par <?= $article->getUser()->getUserFullName() ?></div>
                <p class="fs-5 mb-4">Categories:
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
                    ?>
                </p>
                <p class="fs-5 mb-4">Nombre de commentaires: <?= $article->getCommentCount() ?></p>
                <hr>
            </article>
            <?php
        endforeach;
    endif;
    ?>
<!-- Footer-->
<footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
