<?php

include_once("interfaces/agendas.php");

header('Content-Type: application/json; charset=utf-8');

// Verifica se a requisição POST ou GET contém o parâmetro 'tipo'.
$getRequisicao = isset($_POST['tipo']) && !empty($_POST['tipo']) ? $_POST['tipo'] : NULL;
$postRequisicao = isset($_GET['tipo']) && !empty($_GET['tipo']) ? $_GET['tipo'] : NULL;

// Determina o tipo de requisição com base nos parâmetros encontrados.
$tipoRequisicao = is_null($getRequisicao) ? $postRequisicao : $getRequisicao;

$agendas = new Agendas();

// Executa diferentes ações com base no tipo de requisição.
switch ($tipoRequisicao) {
    case 'set-agenda':
        echo json_encode($agendas->setAgenda($_POST));
        break;
    case 'upt-agenda':
        echo json_encode($agendas->uptAgenda($_POST));
        break;
    case 'get-agendas':
        echo json_encode($agendas->getAgendas($_GET));
        break;
    case 'get-agenda':
        echo json_encode($agendas->getAgenda($_GET['id']));
        break;
    case 'del-agenda':
        echo json_encode($agendas->delAgenda($_GET['id']));
        break;
    default:
        echo json_encode("Erro AJAX: rota não encontrada.");
    break;
}
