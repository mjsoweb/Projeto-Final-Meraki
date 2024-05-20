<?php
require_once '../Model/DTO/UsuarioDTO.php';
require_once '../Model/DAO/UsuarioDAO.php';

error_reporting(0);

$idFor = $_GET['idFor'];

$usuarioDAO = new UsuarioDAO();

$sucesso = $usuarioDAO->excluirFornecedor($idFor);

if ($sucesso) {
    // Resposta JSON indicando sucesso
    json_encode(["success" => true, "message" => "Usuário excluído com sucesso!"]);

} else {
    // Resposta JSON indicando falha
   json_encode(["success" => false, "message" => "Aconteceu um problema ao excluir o usuário!"]);
}

?>
