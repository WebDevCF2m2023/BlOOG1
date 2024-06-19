<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use DateTime;
use Exception;

class PermissionMapping extends AbstractMapping
{
    // Les propriétés de la classe sont le nom des
    // attributs de la table Exemple (qui serait en
    // base de données)
    protected ?int $permission_id;
    protected ?string $permission_name;
    protected ?string $permission_description;
  

    // Les getters et setters
    // Les getters permettent de récupérer la valeur
    // d'un attribut de la classe

    // Les setters permettent de modifier la valeur
    // d'un attribut de la classe, en utilisant l'hydratation
    // venant de la classe AbstractMapping
    public function getPermissionId(): ?int
    {
        return $this->permission_id;
    }

    public function setPermissionId(?int $permission_id): void
    {
        $this->permission_id = $permission_id;
    }

    public function getPermissionName(): ?string
    {
        return $this->permission_name;
    }

    public function setPermissionName(?string $permission_name): void
    {
        $this->permission_name = $permission_name;
    }

    public function getPermissionDescription(): ?string
    {
        return $this->permission_description;
    }

    public function setPermissionDescription(?string $permission_description): void
    {
        $this->permission_description = $permission_description;
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