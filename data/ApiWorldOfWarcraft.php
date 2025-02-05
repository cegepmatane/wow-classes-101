    <?php
    require_once 'EnvLoader.php';
    require_once 'OAuthBlizzard.php';


    class ApiWorldOfWarcraft {
        private static string $apiBaseUrl;
        private static string $namespace;
        private static string $region;
        private static string $locale;

        public static function init(): void {
            if (!isset(self::$apiBaseUrl) || !isset(self::$region) || !isset(self::$namespace) || !isset(self::$locale)) {
                self::$region = EnvLoader::get('REGION');
                self::$namespace = EnvLoader::get('NAMESPACE');
                self::$locale = EnvLoader::get('LOCALE');
                self::$apiBaseUrl = "https://" . self::$region . ".api.blizzard.com/data/wow/";
            }
        }

        public static function faireRequeteApi(string $url): ?array {
            self::init();

            $token = OAuthBlizzard::obtenirTokenAcces();
            if (!$token) {
                return null;
            }

            $enTetes = [
                "Authorization: Bearer {$token}"
            ];

            $urlComplet = self::$apiBaseUrl . $url . "?namespace=" . self::$namespace . "&locale=" . self::$locale;
            $ch = curl_init($urlComplet);
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
