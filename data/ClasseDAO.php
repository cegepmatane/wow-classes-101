<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/model/Classe.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/model/Specialisation.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/CacheManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/ApiWorldOfWarcraft.php';

class ClasseDAO {

    public static function getClasses(): array {
        $cacheKey = "classes";
        if ($cachedData = CacheManager::get($cacheKey)) {
            return $cachedData;
        }

        $data = ApiWorldOfWarcraft::faireRequeteApi('playable-class/index');
        
        if (!$data || !isset($data['classes'])) return [];

        $classes = array_map(fn($classData) => [
            'id' => $classData['id'],
            'nom' => $classData['name']
        ], $data['classes']);
        
        CacheManager::set($cacheKey, $classes);
        return $classes;
    }

    public static function getClasseDetails(int $id): ?Classe {
        $cacheKey = "class_$id";
        if ($cachedData = CacheManager::get($cacheKey)) {
            return new Classe($cachedData);
        }

        $data = ApiWorldOfWarcraft::faireRequeteApi("playable-class/$id");
        
        if (!$data) return null;

        $specialisations = array_map(fn($spec) => $spec['id'], $data['specializations']);
        $energie = $data['power_type']['name'] ?? 'Inconnu';

        // Suppression des rôles dans cette classe
        $classeData = [
            'id' => $data['id'],
            'nom' => $data['name'],
            'specialisations' => $specialisations,
            'energie' => $energie
        ];

        CacheManager::set($cacheKey, $classeData);
        
        return new Classe($classeData);
    }

    public static function getSpecialisationsByClasse(int $classeId): array {
        $cacheKey = "specialisations_classe_$classeId";
        if ($cachedData = CacheManager::get($cacheKey)) {
            return $cachedData;
        }

        $data = ApiWorldOfWarcraft::faireRequeteApi("playable-class/$classeId");
        
        if (!$data || !isset($data['specializations'])) return [];

        $specialisations = array_map(function($spec) {
            $specDetails = [
                'id' => $spec['id'],
                'nom' => $spec['name'],
                'description' => $spec['gender_description']['male'], 
                'role' => $spec['role']['name'] ?? 'Inconnu' 
            ];

            return $specDetails;
        }, $data['specializations']);

        CacheManager::set($cacheKey, $specialisations);
        return $specialisations;
    }
}

