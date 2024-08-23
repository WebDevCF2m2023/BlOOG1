<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

use model\Trait\TraitSlugify;

class TagMapping extends AbstractMapping
{
    // Les propriétés de la classe sont le nom des

    protected ?int $tag_id=null;
    protected ?string $tag_slug=null;
    // nombre de fois que le tag est utilisé
    protected ?int $count_tag=null;

    public function getCountTag(): ?int
    {
        return $this->count_tag;
    }

    public function setCountTag(?int $count_tag): void
    {
        $this->count_tag = $count_tag;
    }

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