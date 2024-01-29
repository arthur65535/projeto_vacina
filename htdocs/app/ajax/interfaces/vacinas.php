<?php

include_once (__DIR__ . '/../../includes/Connection.php');

class Vacinas
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
    private $login;

    public function __construct($login)
    {
        $this->login = $login;
        try {
            $this->pdoPGS = Connection::get()->connect();
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

    public function setVacina($dados)
    {
        return $this->_setVacina($dados);
    }

    public function uptVacina($dados)
    {
        return $this->_uptVacina($dados);
    }
    public function getVacinas()
    {
        return $this->_getVacinas();
    }

    public function getVacina($id)
    {
        return $this->_getVacina($id);
    }

    // ---------------------------------------------------------------
    // FUNÇÕES PRIVADAS AUXILIARES

    // ---------------------------------------------------------------
    // FUNÇÕES PRIVADAS PRINCIPAIS

    private function _setVacina($dados)
    {

    }

    private function _uptVacina($dados)
    {

    }

    private function _getVacinas()
    {

    }

    private function _getVacina($id)
    {

    }
}
