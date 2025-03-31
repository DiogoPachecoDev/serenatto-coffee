<?php

namespace Diogopachecodev\SerenattoCoffee\Infrastructure\Persistence;

use PDO;

class Database
{
    public static function connect(): PDO
    {
        $pdo = new PDO('mysql:host=localhost;dbname=serenatto', 'root', '@Diogo1981');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }
}
