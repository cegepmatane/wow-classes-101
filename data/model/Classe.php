<?php

class Classe {
    public readonly int $id;
    public readonly string $nom;
    public readonly array $specialisations;
    public readonly string $energie;
    public readonly string $roles;

    public function __construct(array $data) {
        $this->id = $data['id'];
        $this->nom = $data['nom'];
        $this->specialisations = $data['specialisations'];
        $this->energie = $data['energie'];
        $this->roles = $data['roles'];
    }

    public function toArray(): array {
        return get_object_vars($this);
    }
}