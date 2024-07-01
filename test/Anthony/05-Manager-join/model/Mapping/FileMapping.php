<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;


class FileMapping extends AbstractMapping
{

    protected ?int $file_id=null;
    protected ?string $file_url=null;
    protected ?string $file_description=null;
    protected ?string $file_type=null;
    protected ?int $article_article_id=null;


    public function getFileId(): ?int
    {
        return $this->file_id;
    }


    public function setFileId(?int $file_id): void
    {
        $this->file_id = $file_id;
    }


    public function getFileUrl(): ?string
    {
        return $this->file_url;
    }


    public function setFileUrl(?string $file_url): void
    {
        $this->file_url = $file_url;
    }

    public function getFileDescription(): ?string
    {
        return $this->file_description;
    }


    public function setFileDescription(?string $file_description)
    {
        if(is_null($file_description)) return null;
        $file_description = trim(strip_tags($file_description));
        $this->file_description = $file_description;
    }

    public function getFileType(): ?string
    {
        return $this->file_type;
    }


    public function setFileType(?string $file_type): void
    {
        $this->file_type = $file_type;
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