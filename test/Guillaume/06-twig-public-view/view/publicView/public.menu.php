  <!-- Responsive navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
            <a class="navbar-brand" href="./">Accueil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <?php
        if(is_null($categories)){
            $categories = [];
        }
        foreach ($categories as $category) {
            ?>
            <li class="nav-item"><a class="nav-link" href=".?route=categorie&slug=<?= $category->getCategorySlug() ?>"><?= $category->getCategoryName() ?></a></li>
            <?php
        }

        ?>
        <li class="nav-item"><a class="nav-link" href="./?connect">Connexion</a></li>
        <li class="nav-item"><a class="nav-link" href="./?inscription">Inscription</a></li>
                    </ul>
                </div>
            </div>
        </nav>
