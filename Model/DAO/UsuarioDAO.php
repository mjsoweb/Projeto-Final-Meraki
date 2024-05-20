<?php

include "Conexao.php";
require_once "../Model/DTO/UsuarioDTO.php";

class UsuarioDAO
{

    public $pdo = null;
    public function __construct()
    {
        $this->pdo = Conexao::getInstance();
    }
    // INSERT

    public function emailExists($emailUsu)
    {
        try {
            $sql = "SELECT COUNT(*) FROM usuario WHERE emailUsu = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $emailUsu);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            return $count > 0;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function salvarUsuario(UsuarioDTO $usuarioDTO)
    {

        if ($this->emailExists($usuarioDTO->getEmailUsu())) {
            return "E-mail já cadastrado!";
        }

        try {
            $sql = "INSERT INTO usuario (nomeUsu,sobrenomeUsu,emailUsu,telefoneUsu,
            senhaUsu,perfilUsu,situacaoUsu) 
            VALUES (?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);

            $nomeUsu = $usuarioDTO->getNomeUsu();
            $sobrenomeUsu = $usuarioDTO->getSobrenomeUsu();
            $emailUsu = $usuarioDTO->getEmailUsu();
            $telefoneUsu = $usuarioDTO->getTelefoneUsu();
            $senhaUsu = $usuarioDTO->getSenhaUsu();
            $perfilUsu = $usuarioDTO->getPerfilUsu();
            $situacaoUsu = $usuarioDTO->getSituacaoUsu();


            $stmt->bindValue(1, $nomeUsu);
            $stmt->bindValue(2, $sobrenomeUsu);
            $stmt->bindValue(3, $emailUsu);
            $stmt->bindValue(4, $telefoneUsu);
            $stmt->bindValue(5, $senhaUsu);
            $stmt->bindValue(6, $perfilUsu);
            $stmt->bindValue(7, $situacaoUsu);

            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


    //LISTAR USUÁRIOS
    public function listarUsuarios()
    {
        try {
            $sql = "SELECT * FROM usuario ";
            $stmt = $this->pdo->prepare($sql);


            $stmt->execute();

            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    //excluir usuários
    public function excluirUsuario($idUsu)
    {
        try {
            $sql = "DELETE FROM usuario
                WHERE idUsu = ?";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idUsu);


            $retorno = $stmt->execute();

            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();

        }
    }


    public function alterarUsuario(UsuarioDTO $usuarioDTO)
    {
        try {
            $sql = "UPDATE usuario SET 
            nomeUsu = ?, 
            sobrenomeUsu = ?, 
            emailUsu = ?, 
            telefoneUsu = ?, 
            perfilUsu = ?, 
            situacaoUsu = ?
            WHERE idUsu = ?";
            $stmt = $this->pdo->prepare($sql);

            $idUsu = $usuarioDTO->getIdUsu();
            $nomeUsu = $usuarioDTO->getNomeUsu();
            $sobrenomeUsu = $usuarioDTO->getSobrenomeUsu();
            $emailUsu = $usuarioDTO->getEmailUsu();
            $telefoneUsu = $usuarioDTO->getTelefoneUsu();
            $perfilUsu = $usuarioDTO->getPerfilUsu();
            $situacaoUsu = $usuarioDTO->getSituacaoUsu();

            $stmt->bindValue(1, $nomeUsu);
            $stmt->bindValue(2, $sobrenomeUsu);
            $stmt->bindValue(3, $emailUsu);
            $stmt->bindValue(4, $telefoneUsu);
            $stmt->bindValue(5, $perfilUsu);
            $stmt->bindValue(6, $situacaoUsu);
            $stmt->bindValue(7, $idUsu);

            $retorno = $stmt->execute();

            // Verifica se a atualização foi bem-sucedida
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();

        }
    }

    //PesquisarUsuarioPorId
    public function pesquisarUsuarioPorId($idUsu)
    {
        try {
            $sql = "SELECT * FROM usuario WHERE idUsu = {$idUsu}; ";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    //
// MD5('123')
    public function validarLogin($emailUsu, $senhaUsu)
    {
        echo "{$emailUsu}";
        echo "{$senhaUsu}";
        try {
            $sql = "SELECT * FROM usuario WHERE emailUsu = '{$emailUsu}' AND
         senhaUsu = '{$senhaUsu}'; ";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    //pesquisar usuario por email para recuperar senha


    public function buscarUsuarioPorEmail($emailUsu)
    {
        try {
            $sql = "SELECT * FROM usuario WHERE emailUsu = {$emailUsu}; ";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function emailExistsFor($emailFor)
    {
        try {
            $sql = "SELECT COUNT(*) FROM fornecedor WHERE emailFor = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $emailFor);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            return $count > 0;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }



    public function salvarFornecedor(UsuarioDTO $UsuarioDTO)
    {

        if ($this->emailExistsFor($UsuarioDTO->getEmailFor())) {
            return "E-mail já cadastrado!";
        }

        try {
            $sql = "INSERT INTO fornecedor (nomeFor, emailFor, telefoneFor) 
            VALUES (?,?,?)";
            $stmt = $this->pdo->prepare($sql);

            $nomeFor = $UsuarioDTO->getNomeFor();
            $telefoneFor = $UsuarioDTO->getTelefoneFor();
            $emailFor = $UsuarioDTO->getEmailFor();



            $stmt->bindValue(1, $nomeFor);
            $stmt->bindValue(2, $telefoneFor);
            $stmt->bindValue(3, $emailFor);


            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


    //LISTAR FORNECEDORES
    public function listarFornecedor()
    {
        try {
            $sql = "SELECT * FROM fornecedor ";
            $stmt = $this->pdo->prepare($sql);


            $stmt->execute();

            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    //excluir usuários
    public function excluirFornecedor($idFor)
    {
        try {
            $sql = "DELETE FROM fornecedor
             WHERE idFor = ?";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idFor);


            $retorno = $stmt->execute();

            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();

        }
    }


    public function alterarFornecedor(UsuarioDTO $UsuarioDTO)
    {
        try {
            $sql = "UPDATE fornecedor SET 
            nomeFor = ?, 
            emailFor = ?, 
            telefoneFor = ?, 
           
            WHERE idFor = ?";
            $stmt = $this->pdo->prepare($sql);

            $idFor = $UsuarioDTO->getIdFor();
            $nomeFor = $UsuarioDTO->getNomeFor();
            $emailFor = $UsuarioDTO->getEmailFor();
            $telefoneFor = $UsuarioDTO->getTelefoneFor();


            $stmt->bindValue(1, $idFor);
            $stmt->bindValue(2, $nomeFor);
            $stmt->bindValue(3, $emailFor);
            $stmt->bindValue(4, $telefoneFor);


            $retorno = $stmt->execute();

            // Verifica se a atualização foi bem-sucedida
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();

        }
    }


    //PesquisarUsuarioPorId
    public function pesquisarUsuarioForId($idFor)
    {
        try {
            $sql = "SELECT * FROM fornecedor WHERE idFor = {$idFor}; ";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}

