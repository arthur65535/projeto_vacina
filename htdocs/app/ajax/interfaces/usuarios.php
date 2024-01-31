<?php

include_once (__DIR__ . '/../../includes/Connection.php');

class Usuarios
{
    // ---------------------------------------------------------------
    // CONSULTAS SQL

    // INSERT
    const SQL_INSERT_NOVO_USUARIO = "INSERT INTO usuarios (nome, data_nascimento, sexo, logradouro, numero, setor, cidade, uf) VALUES (:nome, :data_nascimento, :sexo, :logradouro, :numero, :setor, :cidade, :uf)";
    // UPDATE
    const SQL_UPDATE_USUARIO = "UPDATE usuarios SET logradouro = :logradouro, numero = :numero, setor = :setor, cidade = :cidade, uf = :uf WHERE id = :id";
    // DELETE
    const SQL_DELETE_USUARIO = "DELETE FROM usuarios WHERE id = :id";
    // SELECT
    const SQL_SELECT_USUARIOS = "SELECT * FROM usuarios";

    const SQL_SELECT_USUARIO = "SELECT nome, data_nascimento, sexo, logradouro, numero, setor, cidade, uf FROM usuarios WHERE id = :id";
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

    public function setUsuario($dados)
    {
        return $this->_setUsuario($dados);
    }

    public function uptUsuario($dados)
    {
        return $this->_uptUsuario($dados);
    }
    public function getUsuarios()
    {
        return $this->_getUsuarios();
    }

    public function getUsuario($id)
    {
        return $this->_getUsuario($id);
    }

    public function delUsuario($id)
    {
        return $this->_delUsuario($id);
    }

    // ---------------------------------------------------------------
    // FUNÇÕES PRIVADAS AUXILIARES

    // ---------------------------------------------------------------
    // FUNÇÕES PRIVADAS PRINCIPAIS

    private function _setUsuario($dados)
    {
        try {
            if (!isset($dados) || !is_array($dados)) {
                throw new InvalidArgumentException("Dados invalidos.");
            }

            $stmt = $this->pdoPGS->prepare(self::SQL_INSERT_NOVO_USUARIO);
            $stmt->bindValue(':nome',               strval($dados['nome']), PDO::PARAM_STR);
            $stmt->bindValue(':data_nascimento',    DateTime::createFromFormat('d/m/Y', $dados['data_nascimento'])->format('Y-m-d'));
            $stmt->bindValue(':sexo',               strval($dados['sexo']), PDO::PARAM_STR);
            $stmt->bindValue(':logradouro',         strval($dados['logradouro']), PDO::PARAM_STR);
            $stmt->bindValue(':numero',             intval($dados['numero']), PDO::PARAM_INT);
            $stmt->bindValue(':setor',              strval($dados['setor']), PDO::PARAM_STR);
            $stmt->bindValue(':cidade',             strval($dados['cidade']), PDO::PARAM_STR);
            $stmt->bindValue(':uf',                 strval($dados['uf']), PDO::PARAM_STR);

            if (!$stmt->execute()){
                throw new PDOException("Erro PDO. Detalhes: " . $stmt->errorInfo()[2]);
            } else {
                return [
                    'ERRO' => false,
                    'MENSAGEM' => 'Usuario cadastrado com sucesso.',
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

    private function _uptUsuario($dados)
    {
        try {
            if (!isset($dados) || !is_array($dados)) {
                throw new InvalidArgumentException("Dados invalidos.");
            }

            $stmt = $this->pdoPGS->prepare(self::SQL_UPDATE_USUARIO);
            $stmt->bindValue(':logradouro',     strval($dados['logradouro']), PDO::PARAM_STR);
            $stmt->bindValue(':numero',         intval($dados['numero']), PDO::PARAM_INT);
            $stmt->bindValue(':setor',          strval($dados['setor']), PDO::PARAM_STR);
            $stmt->bindValue(':cidade',         strval($dados['cidade']), PDO::PARAM_STR);
            $stmt->bindValue(':uf',             strval($dados['uf']), PDO::PARAM_STR);
            $stmt->bindValue(':id',             intval($dados['id']), PDO::PARAM_INT);

            if (!$stmt->execute()){
                throw new PDOException("Erro PDO. Detalhes: " . $stmt->errorInfo()[2]);
            } else {
                return [
                    'ERRO' => false,
                    'MENSAGEM' => 'Usuario atualizado com sucesso.',
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

    private function _getUsuarios()
    {
        try {
            $stmt = $this->pdoPGS->query(self::SQL_SELECT_USUARIOS);
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
                    'MENSAGEM' => 'Nenhum registro de usuario encontrado.',
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

    private function _getUsuario($id)
    {
        try {
            $stmt = $this->pdoPGS->prepare(self::SQL_SELECT_USUARIO);
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
                    'MENSAGEM' => 'Usuario nao encontrado.',
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

    private function _delUsuario($dados){
        try {
            if (!isset($dados) ||!is_array($dados)) {
                throw new InvalidArgumentException("Dados invalidos.");
            }

            $stmt = $this->pdoPGS->prepare(self::SQL_DELETE_USUARIO);
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
        } catch (Throwable $e) {
            return [
                'ERRO' => true,
                'MENSAGEM' => $e->getMessage(),
                'DADOS' => []
            ];
        }
    }
}
