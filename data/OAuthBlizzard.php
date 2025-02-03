<?php
require_once 'EnvLoader.php';

class OAuthBlizzard {
    private string $clientId;
    private string $clientSecret;
    private string $cacheExpiration;
    private ?string $tokenAcces = null;
    private ?int $expireA = null;

    public function __construct() {
        $this->clientId = EnvLoader::get('BLIZZARD_CLIENT_ID');
        $this->clientSecret = EnvLoader::get('BLIZZARD_CLIENT_SECRET');
    }

    private function demanderToken(): bool {
        $url = "https://oauth.battle.net/oauth/token";
        $identifiants = base64_encode("{$this->clientId}:{$this->clientSecret}");

        $enTetes = [
            "Authorization: Basic {$identifiants}",
            "Content-Type: application/x-www-form-urlencoded"
        ];

        $donnees = "grant_type=client_credentials";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $donnees);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $enTetes);

        $reponse = curl_exec($ch);
        $codeHttp = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($codeHttp === 200) {
            $json = json_decode($reponse, true);
            $this->tokenAcces = $json['access_token'];
            $this->expireA = time() + $json['expires_in'];
            return true;
        }

        echo "Erreur lors de la récupération du token : {$codeHttp}";
        return false;
    }

    public function obtenirTokenAcces(): ?string {
        if (!$this->tokenAcces || time() >= $this->expireA) {
            if (!$this->demanderToken()) {
                return null;
            }
        }
        return $this->tokenAcces;
    }

    public function faireRequeteApi(string $url): ?array {
        $token = $this->obtenirTokenAcces();
        if (!$token) {
            return null;
        }

        $enTetes = [
            "Authorization: Bearer {$token}"
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $enTetes);

        $reponse = curl_exec($ch);
        $codeHttp = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($codeHttp === 200) {
            return json_decode($reponse, true);
        }

        echo "Erreur lors de la requête API : {$codeHttp}";
        return null;
    }
}
