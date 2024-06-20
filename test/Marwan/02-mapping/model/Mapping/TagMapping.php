<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use DateTime;
use Exception;

class TagMapping extends AbstractMapping
{
    // Les propriétés de la classe sont le nom des
    // attributs de la table Exemple (qui serait en
    // base de données)
    protected ?int $tag_id;
    protected ?string $tag_slug;
    
  

    // Les getters et setters
    // Les getters permettent de récupérer la valeur
    // d'un attribut de la classe

    // Les setters permettent de modifier la valeur
    // d'un attribut de la classe, en utilisant l'hydratation
    // venant de la classe AbstractMapping
    public function getTagId(): ?int
    {
        return $this->tag_id;
    }

    public function setTagId(?int $tag_id): void
    {
        $this->tag_id = $tag_id;
    }

    public function getTagSlug(): ?string
    {
        return $this->tag_slug;
    }

    public function setTag(?string $tag_slug): void
    {
        $this->tag_slug = $tag_slug;
    }

   




}