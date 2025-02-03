<?php

class ClasseDAO {

    // Récupérer la liste des classes
    public static function getClasses(): array {
        $cacheKey = "classes";
        if ($cachedData = CacheManager::get($cacheKey)) {
            return $cachedData;
        }

        // Appel à l'API via la méthode statique de ApiWorldOfWarcraft
        $data = ApiWorldOfWarcraft::faireRequeteApi('playable-class/index');
        
        if (!$data || !isset($data['classes'])) return [];

        $classes = array_map(fn($classData) => [
            'id' => $classData['id'],
            'nom' => $classData['name']
        ], $data['classes']);
        
        CacheManager::set($cacheKey, $classes);
        return $classes;
    }

    // Récupérer les détails d'une classe spécifique
    public static function getClasseDetails(int $id): ?Classe {
        $cacheKey = "class_$id";
        if ($cachedData = CacheManager::get($cacheKey)) {
            return new Classe($cachedData);
        }

        // Appel à l'API via la méthode statique de ApiWorldOfWarcraft
        $data = ApiWorldOfWarcraft::faireRequeteApi("playable-class/$id");
        
        if (!$data) return null;

        $specialisations = array_map(fn($spec) => $spec['id'], $data['specializations']);
        $energie = $data['power_type']['name'] ?? 'Inconnu';

        $roles = [];
        foreach ($data['specializations'] as $spec) {
            $specDetails = ApiWorldOfWarcraft::faireRequeteApi($spec['key']['href']);
            if ($specDetails && isset($specDetails['role'])) {
                $roles[] = $specDetails['role'];
            }
        }

        $classeData = [
            'id' => $data['id'],
            'nom' => $data['name'],
            'specialisations' => $specialisations,
            'energie' => $energie,
            'roles' => implode(", ", array_unique($roles))
        ];

        CacheManager::set($cacheKey, $classeData);
        
        return new Classe($classeData);
    }
}
