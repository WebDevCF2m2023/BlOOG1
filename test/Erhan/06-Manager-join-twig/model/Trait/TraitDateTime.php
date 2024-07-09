<?php

namespace model\Trait;

use DateTime;
use Exception;
trait TraitDateTime
{
    protected function formatDateTime(null|string|DateTime $date, string $paramName)
    {
        // si le nom de la propriété n'existe pas
        if(!property_exists($this, $paramName)){
            return null;
        }
        // si c'est une chaine de caractère
        if(is_string($date)){
            try {
                // on essaye de convertir la date en objet DateTime
                $date = new DateTime($date);
                // utilisation du nom de la propriété 
                $this->$paramName = $date->format("Y-m-d H:i:s");
            } catch (Exception $e) {
                // en cas d'échec, on met la date à null
                $this->$paramName = null;
            }
            // si c'est un objet (DateTime seul possible)
        }elseif (is_object($date)){
            // on formate la date en string en DATETIME
            $this->$paramName = $date->format("Y-m-d H:i:s");
        }else{
            $this->$paramName = null;
        }
    }

}