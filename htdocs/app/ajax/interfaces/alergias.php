<?php

include_once (__DIR__ . '/../../includes/Connection.php');

class Alergias
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

    public function setAlergia($dados)
    {
        return $this->_setAlergia($dados);
    }

    public function uptAlergia($dados)
    {
        return $this->_uptAlergia($dados);
    }
    public function getAlergias()
    {
        return $this->_getAlergias();
    }

    public function getAlergia($id)
    {
        return $this->_getAlergia($id);
    }

    // ---------------------------------------------------------------
    // FUNÇÕES PRIVADAS AUXILIARES

    // ---------------------------------------------------------------
    // FUNÇÕES PRIVADAS PRINCIPAIS

    private function _setAlergia($dados)
    {

    }

    private function _uptAlergia($dados)
    {

    }

    private function _getAlergias()
    {

    }

    private function _getAlergia($id)
    {

    }
}
