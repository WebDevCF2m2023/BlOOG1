<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class ExempleMapping extends AbstractMapping
{
    // Les propriétés de la classe sont le nom des
    // attributs de la table Exemple (qui serait en
    // base de données)
    protected ?int $exemple_id;
    protected ?string $exemple_name;
    protected ?string $exemple_description;
    protected ?int $exemple_number;
    protected ?\DateTime $exemple_date;
    protected ?bool $exemple_boolean;
    protected ?float $exemple_float;

    // Les getters et setters
    // Les getters permettent de récupérer la valeur
    // d'un attribut de la classe

    // Les setters permettent de modifier la valeur
    // d'un attribut de la classe, en utilisant l'hydratation
    // venant de la classe AbstractMapping
    public function getExempleId(): ?int
    {
        return $this->exemple_id;
    }

    public function setExempleId(?int $exemple_id): void
    {
        $this->exemple_id = $exemple_id;
    }

    public function getExempleName(): ?string
    {
        return $this->exemple_name;
    }

    public function setExempleName(?string $exemple_name): void
    {
        $this->exemple_name = $exemple_name;
    }

    public function getExempleDescription(): ?string
    {
        return $this->exemple_description;
    }

    public function setExempleDescription(?string $exemple_description): void
    {
        $this->exemple_description = $exemple_description;
    }

    public function getExempleNumber(): ?int
    {
        return $this->exemple_number;
    }

    public function setExempleNumber(?int $exemple_number): void
    {
        $this->exemple_number = $exemple_number;
    }

    public function getExempleDate(): ?\DateTime
    {
        return $this->exemple_date;
    }

    public function setExempleDate(?\DateTime $exemple_date): void
    {
        $this->exemple_date = $exemple_date;
    }

    public function getExempleBoolean(): ?bool
    {
        return $this->exemple_boolean;
    }

    public function setExempleBoolean(?bool $exemple_boolean): void
    {
        $this->exemple_boolean = $exemple_boolean;
    }

    public function getExempleFloat(): ?float
    {
        return $this->exemple_float;
    }

    public function setExempleFloat(?float $exemple_float): void
    {
        $this->exemple_float = $exemple_float;
    }


}