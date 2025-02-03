<?php
require_once '../donnee/CacheManager.php';
require_once '../donnee/OAuthBlizzard.php';
require_once '../donnee/ClasseDAO.php';
require_once '../donnee/modele/ClasseWoW.php';

// Initialisation des dépendances
$cacheManager = new CacheManager();
$oauth = new OAuthBlizzard();
$classeDAO = new ClasseDAO($oauth, $cacheManager);

// Récupération des classes
$classes = $classeDAO->getClasses();
var_dump($classes);
if ($classes && isset($classes['data']['classes'])) {
    echo "<h1>Liste des classes de World of Warcraft</h1>";
    echo "<ul>";
    foreach ($classes['data']['classes'] as $classe) {
        // Afficher directement le nom de la classe
        echo "<li>{$classe['name']}</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Impossible de récupérer les classes.</p>";
}