<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

use model\Trait\TraitSlugify;

class TagMapping extends AbstractMapping
{
    // Les propriétés de la classe sont le nom des
    // attributs de la table Exemple (qui serait en
    // base de données)
    protected ?int $tag_id=null;
    protected ?string $tag_slug=null;

    use TraitSlugify;
    
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

    public function setTagSlug(?string $tag_slug)
    {
        if(is_null($tag_slug)) return null;
        $this->tag_slug = $this->slugify($tag_slug);
    }

   




}