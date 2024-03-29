<?php

include_once("interfaces/usuarios.php");

header('Content-Type: application/json; charset=utf-8');

// Verifica se a requisição POST ou GET contém o parâmetro 'tipo'.
$getRequisicao = isset($_POST['tipo']) && !empty($_POST['tipo']) ? $_POST['tipo'] : NULL;
$postRequisicao = isset($_GET['tipo']) && !empty($_GET['tipo']) ? $_GET['tipo'] : NULL;

// Determina o tipo de requisição com base nos parâmetros encontrados.
$tipoRequisicao = is_null($getRequisicao) ? $postRequisicao : $getRequisicao;

$usuarios = new Usuarios();

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
