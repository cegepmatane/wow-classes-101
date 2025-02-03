<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../data/OAuthBlizzard.php';

try {
    $oauth = new OAuthBlizzard();
    $token = $oauth->obtenirTokenAcces();

    if ($token) {
        echo "Token d'accès : " . htmlspecialchars($token);
    } else {
        echo "Erreur : impossible d'obtenir le token.";
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
