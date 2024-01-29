<?php

class Connection
{
    const db = "postgres";
    const host = "localhost";
    const user = "postgres";
    const pass = "postgres";
    const dbname = "postgres";
    const port = 5432;
    public object $pdo;

    public static function connect()
    {
        try {
            $conStr = sprintf("pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s", self::host, self::port, self::dbname, self::user, self::pass);

            self::$pdo = new PDO($conStr);

            echo ("Conexão realizada com sucesso.");
            return self::$pdo;
        } catch (PDOException $e) {
            echo ("Erro de conexão: " . $e->getMessage());
        }
    }
    
    public static function get()
    {
        return self::connect();
    }
}
