<?php

class Connection 
{
    public string $db = "postgres";
    public string $host = "localhost";
    public string $user = "postgres";
    public string $pass = "12345";
    public string $dbname = "postgres";
    public int    $port = 5432;
    public object $pdo;

    public function connect()
    {
        try {
            $this->pdo = new PDO($this->db . ':host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname, $this->user, $this->pass);

            echo("Conexão realizada com sucesso.");
            return $this->pdo;
        } catch (PDOException $e){
            echo("Erro de conexão: " . $e->getMessage());
        }
    }
}