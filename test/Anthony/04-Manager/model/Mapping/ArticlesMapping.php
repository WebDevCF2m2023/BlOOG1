<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitDateTime;
use model\Trait\TraitSlugify;
use DateTime;
use Exception;

class ArticlesMapping extends AbstractMapping
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
        // on vérifie que le titre n'est pas vide
        if ($article_title === "") throw new Exception("Merci d'inclure une Titre");
        // on remplit et on protège le titre
        $this->article_title = trim(strip_tags($article_title));

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