<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class PermissionMapping extends AbstractMapping
{
    // Les propriétés de la classe sont le nom des
    // attributs de la table Exemple (qui serait en
    // base de données)
    protected ?int $permission_id=null;
    protected ?string $permission_name=null;
    protected ?string $permission_description=null;

       

       protected ?UserMapping $user=null;

       
       protected ?array $permissions=null;
   
       // getters et setters pour le user
       public function getUser(): ?UserMapping
       {
           return $this->user;
       }
   
       public function setUser(?UserMapping $user): void
       {
           $this->user = $user;
       }


       // getters et setters pour les categories
    public function getPermissions(): ?array
    {
        return $this->permissions;
    }

    public function setCategories(?array $permissions): void
    {
        $this->permissions = $permissions;
    }


    
    

    // Les getters et setters

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
        $this->permission_name = trim(strip_tags($permission_name));
    }

    public function getPermissionDescription(): ?string
    {
        return $this->permission_description;
    }

    public function setPermissionDescription(?string $permission_description): void
    {
        $this->permission_description = trim(strip_tags($permission_description));
    }

}
   