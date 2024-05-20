<?php
require_once '../Model/DTO/UsuarioDTO.php';
require_once '../Model/DAO/UsuarioDAO.php';

  $idFor = strip_tags($_POST["idFor"]);
  $nomeFor = strip_tags($_POST["nomeFor"]);
  $telefoneFor = strip_tags($_POST["telefoneFor"]);
  $emailFor = strip_tags($_POST["emailFor"]);
 

  $fornecedorDTO = new fornecedorDTO;
  $fornecedorDTO->setIdFor($idFor);
  $fornecedorDTO->setNomeFor($nomeFor);
  $fornecedorDTO->setEmailFor($emailFor);
  $fornecedorDTO->setTelefoneFor($telefoneFor);
 

  $usuarioDAO = new UsuarioDAO();

  $sucesso = $usuarioDAO->alterarFornecedor($UsuarioDTO);

   if ($sucesso) {
    json_encode(["success" => true, "message" => "Usuário alterado com sucesso!"]);
  } else {
    json_encode(["success" => false, "message" => "Aconteceu um problema ao alterar o usuário!"]);
  }
// }
?>
