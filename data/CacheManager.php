<?php
require_once 'EnvLoader.php';

class CacheManager {
    private static string $cacheDir;
    private static int $cacheExpiration;

    public static function init(): void {
        if (!isset(self::$cacheExpiration) || !isset(self::$cacheDir)) {
            self::$cacheExpiration = (int) EnvLoader::get('CACHE_EXPIRATION');
            self::$cacheDir = EnvLoader::get('CACHE_DIR');

            if (!file_exists(self::$cacheDir)) {
                mkdir(self::$cacheDir, 0777, true);
            }
        }
    }

    public static function get(string $key): ?array {
        self::init();

        $filePath = self::$cacheDir . '/' . $key . '.json';
        if (file_exists($filePath)) {
            $content = file_get_contents($filePath);
            $data = json_decode($content, true);

            if (isset($data['timestamp']) && time() - $data['timestamp'] < self::$cacheExpiration) {
                return $data['data'];
            }
        }
        return null;
    }
    
    public static function set(string $key, array $data): void {
        self::init();
        $filePath = self::$cacheDir . '/' . $key . '.json';
        $dataToStore = [
            'timestamp' => time(),
            'data' => $data
        ];
        file_put_contents($filePath, json_encode($dataToStore));
    }

    public static function isCached(string $key): bool {
        self::init();
        return file_exists(self::$cacheDir . '/' . $key . '.json');
    }
}
