<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/ClasseDAO.php';

// Vérifier si un ID de classe est fourni
if (!isset($_GET['classe_id']) || !is_numeric($_GET['classe_id'])) {
    header('Content-Type: application/json', true, 400);
    echo json_encode(['error' => 'ID de classe invalide']);
    exit();
}

// Récupérer l'ID de la classe depuis l'URL
$classeId = (int) $_GET['classe_id'];

try {
    // Appeler la méthode du ClasseDAO pour récupérer les spécialisations de la classe
    $specialisations = ClasseDAO::getSpecialisationsByClasse($classeId);

    // Vérifier si des spécialisations ont été retournées
    if (!empty($specialisations)) {
        // Si des spécialisations sont disponibles, les retourner sous forme de JSON
        header('Content-Type: application/json');
        echo json_encode($specialisations); // Retourner les spécialisations en JSON
    } else {
        // Si aucune spécialisation n'a été trouvée, retourner une réponse d'erreur 404
        header('Content-Type: application/json', true, 404);
        echo json_encode(['error' => 'Aucune spécialisation trouvée pour cette classe']);
    }
} catch (Exception $e) {
    // En cas d'exception, retourner une réponse d'erreur 500 avec le message de l'exception
    header('Content-Type: application/json', true, 500);
    echo json_encode(['error' => 'Erreur interne du serveur', 'message' => $e->getMessage()]);
}
?>
