<?php

include_once (__DIR__ . '/../../includes/Connection.php');

class Agendas
{
    // ---------------------------------------------------------------
    // CONSULTAS SQL

    // INSERT
    const SQL_INSERT_NOVA_AGENDA = "INSERT INTO AGENDAS (DATA, HORA, SITUACAO, DATA_SITUACAO, OBSERVACOES) VALUES (:data, :hora, :situacao, :data_situacao, :observacoes)";
    // UPDATE
    const SQL_UPDATE_AGENDA = "UPDATE AGENDAS SET NOME = :nome WHERE ID = :id";
    // DELETE
    const SQL_DELETE_AGENDA = "DELETE FROM AGENDAS WHERE ID = :id";
    // SELECT
    const SQL_SELECT_AGENDAS = "SELECT * FROM AGENDAS";
    const SQL_SELECT_AGENDA = "SELECT * FROM AGENDAS WHERE ID = :id";
    //----------------------------------------------------------------
    // VARIÁVEIS DE CLASSE E CONSTRUTOR
    private $pdoPGS;

    public function __construct()
    {
        try {
            $this->pdoPGS = Connection::connect();
        } catch (\Exception $e) {
            echo ("Erro ao conectar ao banco de dados: ". $e->getMessage());
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

    public function delAgenda($id)
    {
        return $this->_delAgenda($id);
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

    private function _delAgenda($id)
    {

    }
}
