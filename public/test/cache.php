<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/CacheManager.php';

$cache = new CacheManager();

// Charger les données JSON
$data = json_decode(file_get_contents('shaman_data.json'), true);
if (!$data || !isset($data['id'])) {
    die("Erreur : Impossible d'extraire l'ID de la classe depuis les données JSON.\n");
}

// Utiliser l'ID comme clé de cache
$key = 'class_' . $data['id'];

if ($cache->isCached($key)) {
    echo "Données trouvées dans le cache :\n";
    print_r($cache->get($key));
} else {
    echo "Cache vide. Ajout des données...\n";
    $cache->set($key, $data);
    echo "Données ajouter dans la cache :\n";
    print_r($cache->get($key));
}