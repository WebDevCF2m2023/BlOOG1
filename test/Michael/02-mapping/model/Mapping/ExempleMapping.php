<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use DateTime;
use Exception;

class ExempleMapping extends AbstractMapping
{
    // Les propriétés de la classe sont le nom des
    // attributs de la table Exemple (qui serait en
    // base de données)
    protected ?int $exemple_id;
    protected ?string $exemple_name;
    protected ?string $exemple_description;
    protected ?int $exemple_number;
    protected null|string|DateTime $exemple_date;
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
        if($exemple_id<=0) throw new Exception("ID non valide"); 
        $this->exemple_id = $exemple_id;
    }

    public function getExempleName(): ?string
    {
        // décryptage
        return html_entity_decode($this->exemple_name);
        // return $this->exemple_name;
    }

    public function setExempleName(?string $exemple_name): void
    {
        // cryptage
        $text = htmlspecialchars(trim(strip_tags($exemple_name)),ENT_QUOTES);
        $this->exemple_name = $text;
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