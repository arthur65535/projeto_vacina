<?php

include_once("interfaces/vacinas.php");

header('Content-Type: application/json; charset=utf-8');

// Verifica se a requisição POST ou GET contém o parâmetro 'tipo'.
$getRequisicao = isset($_POST['tipo']) && !empty($_POST['tipo']) ? $_POST['tipo'] : NULL;
$postRequisicao = isset($_GET['tipo']) && !empty($_GET['tipo']) ? $_GET['tipo'] : NULL;

// Determina o tipo de requisição com base nos parâmetros encontrados.
$tipoRequisicao = is_null($getRequisicao) ? $postRequisicao : $getRequisicao;

// Inicia a sessão, se ainda não estiver iniciada.
session_start();

// Obtém o login do usuário a partir da sessão.
$login = $_SESSION['login'];

// Verifica se o login está vazio (sessão perdida) e retorna uma mensagem de erro, se necessário.
if (empty($login)) {
    $retorno = array("error" => "session", "message" => "Sessão perdida, faça o login novamente.");
    echo json_encode($retorno);
    exit;
}

// Cria uma instância de Vacinas com o login do usuário.
$vacinas = new Vacinas($login);

// Executa diferentes ações com base no tipo de requisição.
switch ($tipoRequisicao) {
    case 'set-vacina':
        echo json_encode($vacinas->setVacina($_POST));
        break;
    case 'upt-vacina':
        echo json_encode($vacinas->uptVacina($_POST));
        break;
    case 'get-vacinas':
        echo json_encode($vacinas->getVacinas($_GET));
        break;
    case 'get-vacina':
        echo json_encode($vacinas->getVacina($_GET['id']));
        break;
    default:
        echo json_encode("Erro AJAX: rota não encontrada.");
    break;
}
