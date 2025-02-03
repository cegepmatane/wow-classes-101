<?php
require_once 'EnvLoader.php';

class OAuthBlizzard {
    private static string $clientId;
    private static string $clientSecret;
    private static ?string $tokenAcces = null;
    private static ?int $expireA = null;

    private static function init(): void {
        if (!isset(self::$clientId) || !isset(self::$clientSecret)) {
            self::$clientId = EnvLoader::get('BLIZZARD_CLIENT_ID');
            self::$clientSecret = EnvLoader::get('BLIZZARD_CLIENT_SECRET');
        }
    }

    private static function demanderToken(): bool {
        self::init();

        $url = "https://oauth.battle.net/oauth/token";
        $identifiants = base64_encode(self::$clientId . ":" . self::$clientSecret);

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
            self::$tokenAcces = $json['access_token'];
            self::$expireA = time() + $json['expires_in'];
            return true;
        }

        echo "Erreur lors de la récupération du token : {$codeHttp}";
        return false;
    }

    public static function obtenirTokenAcces(): ?string {
        if (!self::$tokenAcces || time() >= self::$expireA) {
            if (!self::demanderToken()) {
                return null;
            }
        }
        return self::$tokenAcces;
    }
}
