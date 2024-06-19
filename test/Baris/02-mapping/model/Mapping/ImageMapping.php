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
    protected ?int $article_article_id ;
    protected null|string|DateTime $exemple_date;

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
        $this->image_description = $image_description;
    }

    public function getArticleArticleId(): ?int
    {
        return $this->article_article_id;
    }

    public function setArticleArticleId(?int $ArticleArticleId): void
    {
        $this->article_article_id = $ArticleArticleId;
    }

    public function getExempleDate(): null|string|DateTime
    {
        return $this->exemple_date;
    }

    public function setExempleDate(null|string|DateTime $exemple_date): void
    {
        // si c'est une chaine de caractère
        if(is_string($exemple_date)){
            try {
                // on essaye de convertir la date en objet DateTime
                $exemple_date = new DateTime($exemple_date);
                $this->exemple_date = $exemple_date->format("Y-m-d H:i:s");
            } catch (Exception $e) {
                // en cas d'échec, on met la date à null
                $this->exemple_date = null;
            }
        // si c'est un objet (DateTime seul possible)
        }elseif (is_object($exemple_date)){
            // on formate la date en string en DATETIME
            $this->exemple_date = $exemple_date->format("Y-m-d H:i:s");
        }else{
            $this->exemple_date = null;
        }

    }



}