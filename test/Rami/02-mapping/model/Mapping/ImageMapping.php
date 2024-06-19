<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use DateTime;
use Exception;

class ImageMapping extends AbstractMapping
{
    // Les propriétés de la classe sont le nom des
    // attributs de la table Exemple (qui serait en
    // base de données)
    protected ?int $image_id;
    protected ?string $image_url;
    protected ?string $image_description;
    protected ?int $article_article_id;

    
    

    // Les getters et setters
    // Les getters permettent de récupérer la valeur
    // d'un attribut de la classe

    // Les setters permettent de modifier la valeur
    // d'un attribut de la classe, en utilisant l'hydratation
    // venant de la classe AbstractMapping
    public function getImageId(): ?int
    {
        return $this->image_id;
    }

    public function setImageId(?int $image_id): void
    {
        $this->image_id = $image_id;
    }

    public function getImageUrl(): ?string
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
        $this->image_description = $image_description;
    }

    public function getArticleArticleId(): ?int
    {
        return $this->article_article_id;
    }

    public function setArticleArticleId(?int $article_article_id): void
    {
        $this->article_article_id = $article_article_id;
    }
}