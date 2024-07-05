<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitDateTime;
use model\Trait\TraitSlugify;
use model\Mapping\UserMapping;
use model\Mapping\CategoryMapping;
use model\Mapping\TagMapping;
use DateTime;
use Exception;

class ArticleMapping extends AbstractMapping
{

    use TraitDateTime;
    use TraitSlugify;

    protected ?int $article_id=null;
    protected ?string $article_title=null;
    protected ?string $article_slug=null;
    protected ?string $article_text=null;
    protected null|string|DateTime $article_date_create=null;
    protected null|string|DateTime $article_date_update=null;
    protected null|string|DateTime $article_date_publish=null;
    protected ?int $user_user_id=null;

    // Pour la jointure interne avec la table user (1 ou 0 possibilité)
    protected ?UserMapping $user=null;

    // Pour la jointure externe avec la table category (0 à n possibilités)
    protected ?array $categories=null;
    // Pour la jointure externe avec la table tag (0 à n possibilités)
    protected ?array $tags=null;

    protected ?int $comment_count=null;

    // getters et setters pour le comment_count
    public function getCommentCount(): ?int
    {
        return $this->comment_count;
    }

    public function setCommentCount(?int $comment_count): void
    {
        $this->comment_count = $comment_count;
    }

    // getters et setters pour le user
    public function getUser(): ?UserMapping
    {
        return $this->user;
    }

    public function setUser(?UserMapping $user): void
    {
        $this->user = $user;
    }

    // getters et setters pour les categories
    public function getCategories(): ?array
    {
        return $this->categories;
    }

    public function setCategories(?array $categories): void
    {
        $this->categories = $categories;
    }

    // getters et setters pour les tags
    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(?array $tags): void
    {
        $this->tags = $tags;
    }

    // getters et setters pour les attributs de la classe
    // représentant les colonnes de la table article
    public function getArticleId(): ?int
    {
        return $this->article_id;
    }

    public function setArticleId(?int $article_id): void
    {
        if ($article_id < 0) throw new Exception("ID NON VALIDE");
        $this->article_id = $article_id;
    }

    public function getArticleTitle(): ?string
    {
        return $this->article_title;
    }

    public function setArticleTitle(?string $article_title)
    {

        // on vérifie que le titre n'est pas null
        if ($article_title === null) return null;
        // on remplit et on protège le titre
        $article_title = trim(strip_tags($article_title));
        // on vérifie que le titre n'est pas vide
        if ($article_title === "") throw new Exception("Merci d'inclure une Titre");
        $this->article_title = $article_title;

    }

    public function getArticleSlug(): ?string
    {
        return $this->article_slug;
    }

    public function setArticleSlug(?string $article_slug): void
    {
        // utilisation de la méthode slugify du trait TraitSlug
        $article_slug = $this->slugify($article_slug);
        if ($article_slug === "n-a") throw new Exception("Merci d'inclure le Slug");
        $this->article_slug = $article_slug;
    }

    public function getArticleText(): ?string
    {
        return $this->article_text;
    }

    public function setArticleText(?string $article_text): void
    {
        $article_text = trim($article_text);
        if ($article_text === "") throw new Exception("Il faut le texte de l'article");
        $this->article_text = $article_text;

    }

    public function getArticleDateCreate(): null|string|DateTime
    {
        return $this->article_date_create;
    }

    public function setArticleDateCreate(null|string|DateTime $article_date_create): void
    {
        // utilisation de la méthode formatDateTime
        $this->formatDateTime($article_date_create, "article_date_create");

    }

    public function getArticleDateUpdate(): null|string|DateTime
    {
        return $this->article_date_update;
    }

    public function setArticleDateUpdate(null|string|DateTime $article_date_update): void
    {

        // utilisation de la méthode formatDateTime
        $this->formatDateTime($article_date_update, "article_date_update");

    }


    public function getArticleDatePublish(): null|string|DateTime
    {
        return $this->article_date_publish;
    }

    public function setArticleDatePublish(null|string|DateTime $article_date_publish): void
    {
        // utilisation de la méthode formatDateTime
        $this->formatDateTime($article_date_publish, "article_date_publish");

    }

    public function getUserUserId(): ?int
    {
        return $this->user_user_id;
    }

    public function setUserUserId(?int $user_user_id): void
    {
        if ($user_user_id < 0) throw new Exception("ID NON VALIDE");
        $this->user_user_id = $user_user_id;
    }
}