<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use DateTime;
use Exception;
use model\Trait\TraitDateTime;

class CommentMapping extends AbstractMapping
{
    // utilisation du trait formatDateTime
    use TraitDateTime;
    // Les propriétés de la classe sont le nom des
    // attributs de la table Comment (qui serait en
    // base de données)

    protected ?int $comment_id;
    protected ?string $comment_text;
    protected ?int $comment_parent;
    protected null|string|DateTime $comment_date_create;
    protected null|string|DateTime $comment_date_update;
    protected null|string|DateTime $comment_date_publish;
    protected ?int $comment_is_published;

    // Les getters et setters

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
        $this->comment_text = htmlspecialchars(trim(strip_tags($comment_text)), ENT_QUOTES);
    }

    public function getCommentParent(): ?int
    {
        return $this->comment_parent;
    }

    public function setCommentParent(?int $comment_parent): void
    {
        $this->comment_parent = $comment_parent;
    }

    public function getCommentDateCreate(): null|string|DateTime
    {
        return $this->comment_date_create;
    }

    public function setCommentDateCreate(null|string|DateTime $comment_date_create): void
    {
        // utilisation de la méthode formatDateTime
        $this->formatDateTime($comment_date_create, "comment_date_create");
    }

    public function getCommentDateUpdate(): null|string|DateTime
    {
        return $this->comment_date_update;
    }

    public function setCommentDateUpdate(null|string|DateTime $comment_date_update): void
    {
          // utilisation de la méthode formatDateTime
        $this->formatDateTime($comment_date_update, "comment_date_update");
    }

    public function getCommentDatePublish(): null|string|DateTime
    {
        return $this->comment_date_publish;
    }

    public function setCommentDatePublish(null|string|DateTime $comment_date_publish): void
    {
        // utilisation de la méthode formatDateTime
        $this->formatDateTime($comment_date_publish, "comment_date_publish");
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

