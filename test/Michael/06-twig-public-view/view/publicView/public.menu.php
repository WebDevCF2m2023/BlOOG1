<nav>
    <ul>
        <li><a href="./">Accueil</a></li>
        <?php
        if(is_null($categories)){
            $categories = [];
        }
        foreach ($categories as $category) {
            ?>
            <li><a href=".?route=categorie&slug=<?= $category->getCategorySlug() ?>"><?= $category->getCategoryName() ?></a></li>
            <?php
        }

        ?>
        <li><a href="./?connect">Connexion</a></li>
        <li><a href="./?inscription">Inscription</a></li>
    </ul>
</nav>
