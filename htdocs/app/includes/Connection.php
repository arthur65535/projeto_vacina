<?php

class Connection 
{
    public string $db = "postgres";
    public string $host = "localhost";
    public string $user = "postgres";
    public string $pass = "12345";
    public string $dbname = "postgres";
    public int $port = 5432;

    public function connect()
    {
        try {
            new PDO($this->db . ':host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname, $this->user, $this->pass);
            echo("Conexão realizada com sucesso.");

        } catch (Exception $e){
            die("Erro com a conexão ao banco de dados.");
        }
    }
}