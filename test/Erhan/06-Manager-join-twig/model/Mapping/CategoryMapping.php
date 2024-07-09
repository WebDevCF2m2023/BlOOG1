<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitSlugify;

class CategoryMapping extends AbstractMapping
{
    
    protected ?int $category_id=null;
    protected ?string $category_name=null;
    protected ?string $category_slug=null;
    protected ?string $category_description=null;
    protected ?int $category_parent=null;

    use TraitSlugify;

    public function getCategoryId(): ?int
    {
        return $this->category_id;
    }

    public function setCategoryId(?int $category_id): void
    {
        if($category_id > 0){
            $this->category_id = $category_id;
        }
    }

    public function getCategoryName(): ?string
    {
        return $this->category_name;
    }

    public function setCategoryName(?string $category_name): void
    {
        $name = trim(strip_tags($category_name));
        $this->category_name = $name;
    }

    public function getCategorySlug(): ?string
    {
        return $this->category_slug;
    }

    public function setCategorySlug(?string $category_slug): void
    {
        $slug = $this->slugify($category_slug);
        $this->category_slug = $slug;
    }

    public function getCategoryDescription(): ?string
    {
        return $this->category_description;
    }

    public function setCategoryDescription(?string $category_description): void
    {
        $this->category_description = trim(strip_tags($category_description));
    }

    public function getCategoryParent(): ?int
    {
        return $this->category_parent;
    }

    public function setCategoryParent(?int $category_parent): void
    {
        if($category_parent >= 0){
            $this->category_parent = $category_parent;
        }    
    }
}