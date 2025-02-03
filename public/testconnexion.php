<?php
require '../donnee/OAuthBlizzard.php';


$authBlizzard = new OAuthBlizzard();

$tokenAcces = $authBlizzard->obtenirTokenAcces();

if ($tokenAcces) {
    echo "Connexion réussie !\n";
    echo "Token d'accès: " . $tokenAcces . "\n";
} else {
    echo "Échec de la connexion.\n";
}
