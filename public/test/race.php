<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/WorldOfWarcraftDAO.php';

header('Content-Type: application/json');

$hordeRaces = WorldOfWarcraftDAO::getRacesParFaction('Horde');
$allianceRaces = WorldOfWarcraftDAO::getRacesParFaction('Alliance');

$response = [
    'horde' => array_map(fn($race) => $race->toArray(), $hordeRaces),
    'alliance' => array_map(fn($race) => $race->toArray(), $allianceRaces)
];

echo json_encode($response, JSON_PRETTY_PRINT);
?>
