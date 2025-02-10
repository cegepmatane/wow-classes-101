<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/model/Classe.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/model/Specialisation.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/model/Race.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/CacheManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/ApiWorldOfWarcraft.php';

class WorldOfWarcraftDAO {

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

        $classeData = [
            'id' => $data['id'],
            'nom' => $data['name'],
            'specialisations' => $specialisations,
            'energie' => $energie
        ];

        CacheManager::set($cacheKey, $classeData);
        
        return new Classe($classeData);
    }

    public static function getSpecialisationsParClasse(int $classeId): array {
        $cacheKey = "specialisations_classe_$classeId";
        if ($cachedData = CacheManager::get($cacheKey)) {
            return $cachedData;
        }
    
        $data = ApiWorldOfWarcraft::faireRequeteApi("playable-class/$classeId");
        
        if (!$data || !isset($data['specializations'])) return [];
    
        $specialisations = [];
    
        foreach ($data['specializations'] as $spec) {
            $specId = $spec['id'];
            $specCacheKey = "specialisation_$specId";
    
            // Vérifier si la spécialisation est déjà en cache
            if ($cachedSpec = CacheManager::get($specCacheKey)) {
                $specialisations[] = new Specialisation($cachedSpec);
                continue;
            }
            
            $specDetails = ApiWorldOfWarcraft::faireRequeteApi("playable-specialization/$specId");
        
            $specialisation = new Specialisation([
                'id' => $specDetails['id'],
                'nom' => $specDetails['name'],
                'description' => $specDetails['gender_description']['male'] ?? '',
                'role' => $specDetails['role']['name'] ?? 'Inconnu'
            ]);
    
            CacheManager::set($specCacheKey, $specialisation->toArray());
            $specialisations[] = $specialisation;
        }
    
        CacheManager::set($cacheKey, $specialisations);
        return $specialisations;
    }

    public static function getRaces(): array {
        $cacheKey = "races";
        if ($cachedData = CacheManager::get($cacheKey)) {
            return array_map(fn($race) => new Race($race), $cachedData);
        }

        $data = ApiWorldOfWarcraft::faireRequeteApi('playable-race/index');
        if (!$data || !isset($data['races'])) return [];

        $races = [];
        foreach ($data['races'] as $raceData) {
            $raceDetails = self::getRaceDetails($raceData['id']);
            if ($raceDetails) {
                $races[] = $raceDetails->toArray();
            }
        }

        CacheManager::set($cacheKey, $races);
        return array_map(fn($race) => new Race($race), $races);
    }

    public static function getRaceDetails(int $id): ?Race {
        $cacheKey = "race_$id";
        if ($cachedData = CacheManager::get($cacheKey)) {
            return new Race($cachedData);
        }

        $data = ApiWorldOfWarcraft::faireRequeteApi("playable-race/$id");
        if (!$data) return null;

        $faction = $data['faction']['name'] ?? 'Inconnu';
        $classesJouables = array_map(fn($class) => $class['id'], $data['playable_classes'] ?? []);

        $raceData = [
            'id' => $data['id'],
            'nom' => $data['name'],
            'faction' => $faction,
            'classes_jouables' => $classesJouables
        ];

        CacheManager::set($cacheKey, $raceData);
        return new Race($raceData);
    }

    public static function getRacesParFaction(string $faction): array {
        return array_filter(self::getRaces(), fn($race) => strtolower($race->faction) === strtolower($faction));
    }
}

