<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class CategoryMapping extends AbstractMapping
{
    
    protected ?int $category_id;
    protected ?string $category_name;
    protected ?string $category_slug;
    protected ?string $category_description;
    protected ?int $category_parent;

    // Les getters et setters
    // Les getters permettent de récupérer la valeur
    // d'un attribut de la classe

    // Les setters permettent de modifier la valeur
    // d'un attribut de la classe, en utilisant l'hydratation
    // venant de la classe AbstractMapping
    public function getCategoryId(): ?int
    {
        return $this->category_id;
    }

    public function setcategoryId(?int $category_id): void
    {
        if($category_id > 0){
            $this->category_id = $category_id;
        }
    }

    public function getcategoryName(): ?string
    {
        return $this->category_name;
    }

    public function setcategoryName(?string $category_name): void
    {
        $name = htmlspecialchars(trim(strip_tags($category_name)));
        $this->category_name = $name;
    }

    public function getcategorySlug(): ?string
    {
        return $this->category_slug;
    }

    public function setcategorySlug(?string $category_slug): void
    {
        $slug = htmlspecialchars(trim(strip_tags($category_slug)));
        $this->category_slug = $slug;
    }

    public function getcategoryDescription(): ?string
    {
        return $this->category_description;
    }

    public function setcategoryDescription(?string $category_description): void
    {
        $this->category_description = $category_description;
    }

    public function getcategoryParent(): ?int
    {
        return $this->category_parent;
    }

    public function setcategoryParent(?int $category_parent): void
    {
        if($category_parent >= 0){
            $this->category_parent = $category_parent;
        }    
    }
}