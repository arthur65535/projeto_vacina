<?php

include_once (__DIR__ . '/../../includes/Connection.php');

class Agendas
{
    // ---------------------------------------------------------------
    // CONSULTAS SQL

    // INSERT

    // UPDATE
    
    // DELETE
    
    // SELECT

    //----------------------------------------------------------------
    // VARIÁVEIS DE CLASSE E CONSTRUTOR
    private $pdoPGS;

    public function __construct()
    {
        try {

        } catch (\Exception $e) {
            return [
                'ERRO' => true,
                'MENSAGEM' => $e->getMessage(),
                'DADOS' => []
            ];
        }
    }

    // ---------------------------------------------------------------
    // FUNÇÕES PÚBLICAS

    // ---------------------------------------------------------------
    // FUNÇÕES PRIVADAS AUXILIARES

    // ---------------------------------------------------------------
    // FUNÇÕES PRIVADAS PRINCIPAIS
}
