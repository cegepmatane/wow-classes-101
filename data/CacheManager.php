<?php
require_once 'EnvLoader.php';

class CacheManager {
    private string $cacheDir;
    private int $cacheExpiration;

    public function __construct() {
        $this->cacheExpiration = (int) EnvLoader::get('CACHE_EXPIRATION');
        $this->cacheDir = EnvLoader::get('CACHE_DIR');

        if (!file_exists($this->cacheDir)) {
            mkdir($this->cacheDir, 0777, true);
        }
    }

    public function get(string $key): ?array {
        $filePath = $this->cacheDir . '/' . $key . '.json';
        if (file_exists($filePath)) {
            $content = file_get_contents($filePath);
            $data = json_decode($content, true);

            if (isset($data['timestamp']) && time() - $data['timestamp'] < $this->cacheExpiration) {
                return $data['data'];
            }
        }
        return null;
    }
    
    public function set(string $key, array $data): void {
        $filePath = $this->cacheDir . '/' . $key . '.json';
        $dataToStore = [
            'timestamp' => time(),
            'data' => $data
        ];
        file_put_contents($filePath, json_encode($dataToStore));
    }

    public function isCached(string $key): bool {
        return file_exists($this->cacheDir . '/' . $key . '.json');
    }
}