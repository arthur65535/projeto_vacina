<?php

include_once (__DIR__ . '/../../includes/Connection.php');

class Alergias
{
    // ---------------------------------------------------------------
    // CONSULTAS SQL

    // INSERT
    const SQL_INSERT_NOVA_ALERGIA = "INSERT INTO ALERGIAS (NOME) VALUES (:nome)";
    // UPDATE
    const SQL_UPDATE_ALERGIA = "UPDATE ALERGIAS SET NOME = :nome WHERE ID = :id";
    // DELETE
    const SQL_DELETE_ALERGIA = "DELETE FROM ALERGIAS WHERE ID = :id";
    // SELECT
    const SQL_SELECT_ALERGIAS = "SELECT * FROM ALERGIAS";
    const SQL_SELECT_ALERGIA = "SELECT * FROM ALERGIAS WHERE ID = :id";
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

    public function delAlergia($id)
    {
        return $this->_delAlergia($id);
    }

    // ---------------------------------------------------------------
    // FUNÇÕES PRIVADAS AUXILIARES

    // ---------------------------------------------------------------
    // FUNÇÕES PRIVADAS PRINCIPAIS

    private function _setAlergia($dados)
    {
        try {
            if (!isset($dados) || !is_array($dados)) {
                throw new InvalidArgumentException("Dados invalidos.");
            }

            $stmt = $this->pdoPGS->prepare(self::SQL_INSERT_NOVA_ALERGIA);
            $stmt->bindValue(':nome', strval($dados['nome']), PDO::PARAM_STR);

            if (!$stmt->execute()){
                throw new PDOException("Erro PDO. Detalhes: " . $stmt->errorInfo()[2]);
            } else {
                return [
                    'ERRO' => false,
                    'MENSAGEM' => 'Alergia cadastrada com sucesso.',
                    'DADOS' => []
                ];
            }
        } catch (Throwable $e){
            return [
                'ERRO' => true,
                'MENSAGEM' => $e->getMessage(),
                'DADOS' => []
            ];
        }
    }

    private function _uptAlergia($dados)
    {
        try {
            if (!isset($dados) || !is_array($dados)) {
                throw new InvalidArgumentException("Dados invalidos.");
            }

            $stmt = $this->pdoPGS->prepare(self::SQL_UPDATE_ALERGIA);
            $stmt->bindValue(':nome',           strval($dados['nome']), PDO::PARAM_STR);
            $stmt->bindValue(':id',             intval($dados['id']), PDO::PARAM_INT);

            if (!$stmt->execute()){
                throw new PDOException("Erro PDO. Detalhes: " . $stmt->errorInfo()[2]);
            } else {
                return [
                    'ERRO' => false,
                    'MENSAGEM' => 'Alergia atualizada com sucesso.',
                    'DADOS' => []
                ];
            }
        } catch (Throwable $e){
            return [
                'ERRO' => true,
                'MENSAGEM' => $e->getMessage(),
                'DADOS' => []
            ];
        }
    }

    private function _getAlergias()
    {
        try {
            $stmt = $this->pdoPGS->query(self::SQL_SELECT_ALERGIAS);
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($resultado)) {
                return [
                    'ERRO' => false,
                    'MENSAGEM' => '',
                    'DADOS' => $resultado
                ];
            } else {
                return [
                    'ERRO' => true,
                    'MENSAGEM' => 'Nenhum registro de alergia encontrado.',
                    'DADOS' => []
                ];
            }
        } catch (Throwable $e){
            return [
                'ERRO' => true,
                'MENSAGEM' => $e->getMessage(),
                'DADOS' => []
            ];
        }
    }

    private function _getAlergia($id)
    {
        try {
            $stmt = $this->pdoPGS->prepare(self::SQL_SELECT_ALERGIA);
            $stmt->bindValue(':id', intval($id), PDO::PARAM_INT);
            
            if (!$stmt->execute()){
                throw new PDOException("Erro PDO. Detalhes: ". $stmt->errorInfo()[2]);
            } else {
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            if (!empty($resultado)) {
                return [
                    'ERRO' => false,
                    'MENSAGEM' => '',
                    'DADOS' => $resultado
                ];
            } else {
                return [
                    'ERRO' => true,
                    'MENSAGEM' => 'Alergia nao encontrada.',
                    'DADOS' => []
                ];
            }
        } catch (Throwable $e){
            return [
                'ERRO' => true,
                'MENSAGEM' => $e->getMessage(),
                'DADOS' => []
            ];
        }
    }

    private function _delAlergia($dados)
    {
        try {
            if (!isset($dados) ||!is_array($dados)) {
                throw new InvalidArgumentException("Dados invalidos.");
            }

            $stmt = $this->pdoPGS->prepare(self::SQL_DELETE_ALERGIA);
            $stmt->bindValue(':id', intval($dados['id']), PDO::PARAM_INT);

            if (!$stmt->execute()) {
                throw new PDOException("Erro PDO. Detalhes: ". $stmt->errorInfo()[2]);
            } else {
                return [
                    'ERRO' => false,
                    'MENSAGEM' => 'Alergia excluida com sucesso.',
                    'DADOS' => []
                ];
            }
        } catch (Throwable $e){
            return [
                'ERRO' => true,
                'MENSAGEM' => $e->getMessage(),
                'DADOS' => []
            ];
        }
    }
}
