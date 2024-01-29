<?php

include_once("interfaces/usuarios.php");

header('Content-Type: application/json; charset=utf-8');

// Verifica se a requisição POST ou GET contém o parâmetro 'tipo'.
$getRequisicao = isset($_POST['tipo']) && !empty($_POST['tipo']) ? $_POST['tipo'] : NULL;
$postRequisicao = isset($_GET['tipo']) && !empty($_GET['tipo']) ? $_GET['tipo'] : NULL;

// Determina o tipo de requisição com base nos parâmetros encontrados.
$tipoRequisicao = is_null($getRequisicao) ? $postRequisicao : $getRequisicao;

// Inicia a sessão, se ainda não estiver iniciada.
session_start();

// Obtém o login do usuário a partir da sessão.
// $login = $_SESSION['login'];
$login = 'Arthur';

// Verifica se o login está vazio (sessão perdida) e retorna uma mensagem de erro, se necessário.
if (empty($login)) {
    $retorno = array("error" => "session", "message" => "Sessão perdida, faça o login novamente.");
    echo json_encode($retorno);
    exit;
}

// Cria uma instância de Usuarios com o login do usuário.
$usuarios = new Usuarios($login);

// Executa diferentes ações com base no tipo de requisição.
switch ($tipoRequisicao) {
    case 'set-usuario':
        echo json_encode($usuarios->setUsuario($_POST));
        break;
    case 'upt-usuario':
        echo json_encode($usuarios->uptUsuario($_POST));
        break;
    case 'get-usuarios':
        echo json_encode($usuarios->getUsuarios($_GET));
        break;
    case 'get-usuario':
        echo json_encode($usuarios->getUsuario($_GET['id']));
        break;
    case 'del-usuario':
        echo json_encode($usuarios->delUsuario($_POST));
        break;
    default:
        echo json_encode("Erro AJAX: rota não encontrada.");
    break;
}
