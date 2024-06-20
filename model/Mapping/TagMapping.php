<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class TagMapping extends AbstractMapping
{
    // Les propriétés de la classe sont le nom des
    // attributs de la table Exemple (qui serait en
    // base de données)
    protected ?int $tag_id;
    protected ?string $tag_slug;
    
    // Les getters et setters
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
        $this->tag_slug = htmlspecialchars(trim(strip_tags($tag_slug)), ENT_QUOTES);
    }

   




}