<?php

require_once '../Model/DTO/UsuarioDTO.php';
require_once '../Model/DAO/UsuarioDAO.php';

// $idFor = strip_tags($_POST["idFor"]);
$nomeFor = strip_tags($_POST["nomeFor"]);
$emailFor = strip_tags($_POST["emailFor"]);
$telefoneFor = strip_tags($_POST["telefoneFor"]);


$usuarioDTO = new UsuarioDTO();

// $usuarioDTO->setIdFor($idFor);
$usuarioDTO->setNomeFor($nomeFor);
$usuarioDTO->setEmailFor($emailFor);
$usuarioDTO->setTelefoneFor($telefoneFor);

$usuarioDAO = new UsuarioDAO();

$sucesso = $usuarioDAO->salvarFornecedor($usuarioDTO);

if ($sucesso === "E-mail já cadastrado!") {
  echo json_encode(["success" => false, "message" => $sucesso]);
} else if ($sucesso) {
  echo json_encode(["success" => true, "message" => "Usuário cadastrado com sucesso!"]);
} else {
  echo json_encode(["success" => false, "message" => "Aconteceu um problema no cadastramento"]);
}


?>