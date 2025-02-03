<?php
require_once 'OAuthBlizzard.php';
require_once 'CacheManager.php';

class Classe {
    public int $id;
    public string $nom;
    public array $specialisations;
    public string $energie;
    public string $roles;

    public function __construct(int $id, string $nom, array $specialisations, string $energie, string $roles) {
        $this->id = $id;
        $this->nom = $nom;
        $this->specialisations = $specialisations;
        $this->energie = $energie;
        $this->roles = $roles;
    }

    public function toArray(): array {
        return get_object_vars($this);
    }
}