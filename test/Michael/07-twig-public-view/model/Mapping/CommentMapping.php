<?php

# notre espace de nom pour les mapping 
namespace model\Mapping;

# notre classe abstraite de mapping 
use model\Abstract\AbstractMapping;

# notre trait de gestion du DateTime 
use model\Trait\TraitDateTime;

use model\Mapping\UserMapping;

# objets se trouvant à la racine de l'espace de nom, 
# il faut les appeler dans notre espace de nom model\Mapping 
# pour pouvoir les utiliser 
use DateTime;
use Exception;


# classe de mapping de la table comment, étendue de AbstractMapping
class CommentMapping extends AbstractMapping
{

    # utilisation du trait formatDateTime
    use TraitDateTime;

    # Les propriétés mapping classe sont le nom des
    # attributs de la table Comment (qui est en base de données)

    protected ?int $comment_id=null;
    protected ?string $comment_text=null;
    protected ?int $comment_parent=null;
    protected null|string|DateTime $comment_date_create=null;
    protected null|string|DateTime $comment_date_update=null;
    protected null|string|DateTime $comment_date_publish=null;
    protected ?int $comment_is_published=null;
    protected ?int $user_user_id=null;
    protected ?int $article_article_id=null;

    protected ?UserMapping $user=null;

    // Les getters et setters

    public function getUser(): ?UserMapping
    {
        return $this->user;
    }

    public function setUser(?UserMapping $user): void
    {
        $this->user = $user;
    }

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
        $comment_text = trim(strip_tags($comment_text));
        if(empty($comment_text)) throw new Exception("Texte invalide");
        $this->comment_text = $comment_text;
        
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
        // utilisation de la méthode formatDateTime qui vient de TraitDateTime
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


    public function getUserUserId(): ?int
    {
        return $this->user_user_id;
    }

    public function setUserUserId(?int $user_user_id): void
    {
        $this->user_user_id = $user_user_id;
    }


    public function getArticleArticleId(): ?int
    {
        return $this->article_article_id;
    }

    public function setArticleArticleId(?int $article_article_id): void
    {
        $this->article_article_id = $article_article_id;
    }




}

