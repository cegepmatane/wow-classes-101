<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/WorldOfWarcraftDAO.php';

header('Content-Type: application/json');

if (!isset($_GET['faction'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Paramètre "faction" requis (alliance ou horde)']);
    exit;
}

$faction = strtolower($_GET['faction']);
$validFactions = ['alliance', 'horde'];

if (!in_array($faction, $validFactions)) {
    http_response_code(400);
    echo json_encode(['error' => 'Faction invalide. Utilisez "alliance" ou "horde".']);
    exit;
}

try {
    $races = WorldOfWarcraftDAO::getRacesParFaction($faction);
    echo json_encode(array_map(fn($race) => $race->toArray(), $races));
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>