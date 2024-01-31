<?php

include_once (__DIR__ . '/../../includes/Connection.php');

class Vacinas
{
    // ---------------------------------------------------------------
    // CONSULTAS SQL

    // INSERT
    const SQL_INSERT_NOVA_VACINA = "INSERT INTO VACINAS (TITULO, DESCRICAO, DOSES, PERIODICIDADE, INTERVALO) VALUES (:titulo, :descricao, :doses, :periodicidade, :intervalo)";
    // UPDATE
    const SQL_UPDATE_VACINA = "UPDATE VACINAS SET DESCRICAO = :descricao, DOSES = :doses, PERIODICIDADE = :periodicidade, INTERVALO = :intervalo WHERE id = :id";
    // DELETE
    const SQL_DELETE_VACINA = "DELETE FROM VACINAS WHERE id = :id";
    // SELECT
    const SQL_SELECT_VACINAS = "SELECT * FROM VACINAS";

    const SQL_SELECT_VACINA = "SELECT * FROM VACINAS WHERE id = :id";
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

    public function delVacina($id)
    {
        return $this->_delVacina($id);
    }

    // ---------------------------------------------------------------
    // FUNÇÕES PRIVADAS AUXILIARES

    // ---------------------------------------------------------------
    // FUNÇÕES PRIVADAS PRINCIPAIS

    private function _setVacina($dados)
    {
        try {
            if (!isset($dados) || !is_array($dados)) {
                throw new InvalidArgumentException("Dados invalidos.");
            }

            $stmt = $this->pdoPGS->prepare(self::SQL_INSERT_NOVA_VACINA);
            $stmt->bindValue(':titulo',              strval($dados['titulo']),          PDO::PARAM_STR);
            $stmt->bindValue(':descricao',           strval($dados['descricao']),       PDO::PARAM_STR);
            $stmt->bindValue(':doses',               intval($dados['doses']),           PDO::PARAM_INT);
            $stmt->bindValue(':periodicidade',       intval($dados['periodicidade']),   PDO::PARAM_INT);
            $stmt->bindValue(':intervalo',           intval($dados['intervalo']),       PDO::PARAM_INT);

            if (!$stmt->execute()){
                throw new PDOException("Erro PDO. Detalhes: " . $stmt->errorInfo()[2]);
            } else {
                return [
                    'ERRO' => false,
                    'MENSAGEM' => 'Vacina cadastrada com sucesso.',
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

    private function _uptVacina($dados)
    {
        try {
            if (!isset($dados) || !is_array($dados)) {
                throw new InvalidArgumentException("Dados invalidos.");
            }

            $stmt = $this->pdoPGS->prepare(self::SQL_UPDATE_VACINA);
            $stmt->bindValue(':descricao',      strval($dados['descricao']),        PDO::PARAM_STR);
            $stmt->bindValue(':doses',          intval($dados['doses']),            PDO::PARAM_INT);
            $stmt->bindValue(':periodicidade',  intval($dados['periodicidade']),    PDO::PARAM_INT);
            $stmt->bindValue(':intervalo',      intval($dados['intervalo']),        PDO::PARAM_INT);

            if (!$stmt->execute()) {
                throw new PDOException("Erro PDO. Detalhes: " . $stmt->errorInfo()[2]);
            } else {
                return [
                    'ERRO' => false,
                    'MENSAGEM' => 'Vacina atualizada com sucesso.',
                    'DADOS' => []
                ];
            }
        } catch (Throwable $e) {
            return [
                'ERRO' => true,
                'MENSAGEM' => $e->getMessage(),
                'DADOS' => []
            ];
        }
    }

    private function _getVacinas()
    {
        try {
            $stmt = $this->pdoPGS->query(self::SQL_SELECT_VACINAS);
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
                    'MENSAGEM' => 'Nenhum registro de vacina encontrado.',
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

    private function _getVacina($id)
    {
        try {
            $stmt = $this->pdoPGS->prepare(self::SQL_SELECT_VACINA);
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
                    'MENSAGEM' => 'Vacina nao encontrada.',
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

    private function _delVacina($id)
    {
        try {
            if (!isset($dados) ||!is_array($dados)) {
                throw new InvalidArgumentException("Dados invalidos.");
            }

            $stmt = $this->pdoPGS->prepare(self::SQL_DELETE_VACINA);
            $stmt->bindValue(':id', intval($dados['id']), PDO::PARAM_INT);

            if (!$stmt->execute()) {
                throw new PDOException("Erro PDO. Detalhes: ". $stmt->errorInfo()[2]);
            } else {
                return [
                    'ERRO' => false,
                    'MENSAGEM' => 'Usuario excluido com sucesso.',
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
