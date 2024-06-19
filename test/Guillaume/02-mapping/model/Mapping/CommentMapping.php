<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use DateTime;
use Exception;

class CommentMapping extends AbstractMapping
{
    // Les propriétés de la classe sont le nom des
    // attributs de la table Comment (qui serait en
    // base de données)

    protected ?int $comment_id;
    protected ?string $comment_text;
    protected ?string $comment_parent;
    protected null|string|DateTime $comment_date_create;
    protected null|string|DateTime $comment_date_update;
    protected null|string|DateTime $comment_date_publish;
    protected ?int $comment_is_published;

    // Les getters et setters
    // Les getters permettent de récupérer la valeur
    // d'un attribut de la classe

    // Les setters permettent de modifier la valeur
    // d'un attribut de la classe, en utilisant l'hydratation
    // venant de la classe AbstractMapping

    public function getCommentId(): ?int
    {
        return $this->comment_id;
    }

    public function setCommentId(?int $comment_id): void
    {
        $this->comment_id = $comment_id;
    }

    public function getCommentText(): ?string
    {
        return $this->comment_text;
    }

    public function setCommentText(?string $comment_text): void
    {
        $this->comment_text = $comment_text;
    }

    public function getCommentParent(): ?int
    {
        return $this->comment_parent;
    }

    public function setCommentParent(?string $comment_parent): void
    {
        $this->comment_parent = $comment_parent;
    }

    public function getCommentDateCreate(): null|string|DateTime
    {
        return $this->comment_date_create;
    }

    public function setCommentDateCreate(null|string|DateTime $comment_date_create): void
    {
        // si c'est une chaine de caractère
        if(is_string($comment_date_create)){
            try {
                // on essaye de convertir la date en objet DateTime
                $comment_date_create = new DateTime($comment_date_create);
                $this->comment_date_create = $comment_date_create->format("Y-m-d H:i:s");
            } catch (Exception $e) {
                // en cas d'échec, on met la date à null
                $this->comment_date_create = null;
            }
        // si c'est un objet (DateTime seul possible)
        }elseif (is_object($comment_date_create)){
            // on formate la date en string en DATETIME
            $this->comment_date_create = $comment_date_create->format("Y-m-d H:i:s");
        }else{
            $this->comment_date_create = null;
        }
    }

    public function getCommentDateUpdate(): null|string|DateTime
    {
        return $this->comment_date_update;
    }

    public function setCommentDateUpdate(null|string|DateTime $comment_date_update): void
    {
          // si c'est une chaine de caractère
          if(is_string($comment_date_update)){
            try {
                // on essaye de convertir la date en objet DateTime
                $comment_date_update = new DateTime($comment_date_update);
                $this->comment_date_update = $comment_date_update->format("Y-m-d H:i:s");
            } catch (Exception $e) {
                // en cas d'échec, on met la date à null
                $this->comment_date_update = null;
            }
        // si c'est un objet (DateTime seul possible)
        }elseif (is_object($comment_date_update)){
            // on formate la date en string en DATETIME
            $this->comment_date_update = $comment_date_update->format("Y-m-d H:i:s");
        }else{
            $this->comment_date_update = null;
        }
    }

    public function getCommentDatePublish(): null|string|DateTime
    {
        return $this->comment_date_publish;
    }

    public function setCommentDatePublish(null|string|DateTime $comment_date_publish): void
    {
          // si c'est une chaine de caractère
          if(is_string($comment_date_publish)){
            try {
                // on essaye de convertir la date en objet DateTime
                $comment_date_publish = new DateTime($comment_date_publish);
                $this->comment_date_publish = $comment_date_publish->format("Y-m-d H:i:s");
            } catch (Exception $e) {
                // en cas d'échec, on met la date à null
                $this->comment_date_publish = null;
            }
        // si c'est un objet (DateTime seul possible)
        }elseif (is_object($comment_date_publish)){
            // on formate la date en string en DATETIME
            $this->comment_date_publish = $comment_date_publish->format("Y-m-d H:i:s");
        }else{
            $this->comment_date_publish = null;
        }
    }

    public function getCommentIsPublished(): ?int
    {
        return $this->comment_is_published;
    }

    public function setCommentIsPublished(?int $comment_is_published): void
    {
        $this->comment_is_published = $comment_is_published;
    }


}

