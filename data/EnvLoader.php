<?php

// Par défaut cherche le .env au meme niveaux que cette classe 

class EnvLoader {
    private static array $variables = [];
    private static bool $charge = false;

    public static function charger($cheminEnv){
        if (self::$charge) {
            return;
        }

        if (!file_exists($cheminEnv)) {
            throw new Exception("Fichier .env non trouvé : " . $cheminEnv);
        }

        $lignes = file($cheminEnv, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lignes as $ligne) {
            if (strpos($ligne, '=') !== false) {
                list($cle, $valeur) = explode('=', $ligne, 2);
                self::$variables[trim($cle)] = trim($valeur);
            }
        }

        self::$charge = true;
    }

    public static function get(string $cle, string $defaut = '', string $cheminEnv = __DIR__ . "/.env"){
        self::charger($cheminEnv);
        
        return self::$variables[$cle] ?? $defaut;
    }
}
