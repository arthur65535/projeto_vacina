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

    public function setAgenda($dados)
    {
        return $this->_setAgenda($dados);
    }

    public function uptAgenda($dados)
    {
        return $this->_uptAgenda($dados);
    }
    public function getAgendas()
    {
        return $this->_getAgendas();
    }

    public function getAgenda($id)
    {
        return $this->_getAgenda($id);
    }

    // ---------------------------------------------------------------
    // FUNÇÕES PRIVADAS AUXILIARES

    // ---------------------------------------------------------------
    // FUNÇÕES PRIVADAS PRINCIPAIS

    private function _setAgenda($dados)
    {

    }

    private function _uptAgenda($dados)
    {

    }

    private function _getAgendas()
    {

    }

    private function _getAgenda($id)
    {

    }
}
