<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;


class ImageMapping extends AbstractMapping
{
    // Les propriétés de la classe sont le nom des
    // attributs de la table Exemple (qui serait en
    // base de données)
    protected ?int $image_id=null;
    protected ?string $image_url=null;
    protected ?string $image_description=null;
    protected ?string $image_type=null;
    protected ?int $article_article_id=null;


    public function getImageId(): ?int
    {
        return $this->image_id;
    }

    public function setimageId(?string $image_id): void
    {
        $this->image_id = $image_id;
    }

    public function getImageUrlName(): ?string
    {
        return $this->image_url;
    }

    public function setImageUrl(?string $image_url): void
    {
        $this->image_url = $image_url;
    }

    public function getImageDescription(): ?string
    {
        return $this->image_description;
    }

    public function setImageDescription(?string $image_description): void
    {
        $this->image_description = trim(strip_tags($image_description));
    }

    public function getArticleArticleId(): ?int
    {
        return $this->article_article_id;
    }

    public function setArticleArticleId(?int $ArticleArticleId): void
    {
        $this->article_article_id = $ArticleArticleId;
    }

    public function getImageType(): ?string
    {
        return $this->image_type;
    }

    public function setImageType(?string $image_type): void
    {
        $this->image_type = $image_type;
    }



}