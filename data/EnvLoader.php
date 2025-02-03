<?php

class EnvLoader {
    private static array $variables = [];
    private static array $charge = [];

    public static function load(string $cheminEnv): void
    {
        $realpathCheminEnv = realpath($cheminEnv);
        if (in_array($realpathCheminEnv, self::$charge))
        {
            return;
        }

        if (!file_exists($realpathCheminEnv))
        {
            throw new Exception("Fichier .env non trouvé : " . $realpathCheminEnv);
        }

        $lignes = file($realpathCheminEnv, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lignes as $ligne)
        {
            if (strpos($ligne, '=') !== false)
            {
                list($cle, $valeur) = explode('=', $ligne, 2);
                self::$variables[trim($cle)] = trim($valeur);
            }
        }

        array_push(self::$charge, $realpathCheminEnv);

        return;
    }

    public static function get(string $cle, string $defaut = '', string $cheminEnv = __DIR__ . "/.env")
    {
        self::load($cheminEnv);

        return self::$variables[$cle] ?? $defaut;
    }
}