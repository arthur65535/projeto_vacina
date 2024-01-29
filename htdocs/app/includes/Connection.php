<?php

class Connection
{
    const host = 'persistencia';
    const port = 5432;
    const dbname = 'postgres';
    const user = 'postgres';
    const password = '12345';

    public static function connect()
    {
        try {
            $dsn = 'pgsql:host='.self::host.';port='.self::port.';dbname='.self::dbname.';user='.self::user.';password='.self::password;
            $pdo = new PDO($dsn);
            return $pdo;
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
    }
}
