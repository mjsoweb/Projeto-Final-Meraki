<?php
//data transfer object - transferencia dos dados do formulario (view)
class UsuarioDTO
{
    private $idUsu;
    private $cpfUsu;
    private $nomeUsu;
    private $telefoneUsu;
    private $emailUsu;
    private $senhaUsu;
    private $perfilUsu;
    private $situacaoUsu;
    private $sobrenomeUsu;
    private $idFor;
    private $nomeFor;
    private $telefoneFor;
    private $emailFor;

    public function setSituacaoUsu($situacaoUsu)
    {
        $this->situacaoUsu = $situacaoUsu;

    }
    public function getSituacaoUsu()
    {
        return $this->situacaoUsu;
    }
    //
    public function setPerfilUsu($perfilUsu)
    {
        $this->perfilUsu = $perfilUsu;

    }
    public function getPerfilUsu()
    {
        return $this->perfilUsu;
    }
    public function setSenhaUsu($senhaUsu)
    {
        $this->senhaUsu = $senhaUsu;

    }
    public function getSenhaUsu()
    {
        return $this->senhaUsu;
    }

    public function setEmailUsu($emailUsu)
    {
        $this->emailUsu = $emailUsu;

    }
    public function getEmailUsu()
    {
        return $this->emailUsu;
    }

    public function setTelefoneUsu($telefoneUsu)
    {
        $this->telefoneUsu = $telefoneUsu;

    }
    public function getTelefoneUsu()
    {
        return $this->telefoneUsu;
    }

    public function setCpfUsu($cpfUsu)
    {
        $this->cpfUsu = $cpfUsu;

    }
    public function getCpfUsu()
    {
        return $this->cpfUsu;
    }

    public function setNomeUsu($nomeUsu)
    {
        $this->nomeUsu = $nomeUsu;

    }
    public function getNomeUsu()
    {
        return $this->nomeUsu;
    }
    public function setSobrenomeUsu($sobrenomeUsu)
    {
        $this->sobrenomeUsu = $sobrenomeUsu;

    }
    public function getSobrenomeUsu()
    {
        return $this->sobrenomeUsu;
    }

    public function setidUsu($idUsu)
    {
        $this->idUsu = $idUsu;

    }
    public function getidUsu()
    {
        return $this->idUsu;
    }

    public function setidFor($idFor)
    {
        $this->idFor = $idFor;

    }
    public function getidFor()
    {
        return $this->idFor;
    }
    public function setEmailFor($emailFor)
    {
        $this->emailFor = $emailFor;

    }
    public function getEmailFor()
    {
        return $this->emailFor;
    }
    public function setTelefoneFor($telefoneFor)
    {
        $this->telefoneFor = $telefoneFor;

    }
    public function getTelefoneFor()
    {
        return $this->telefoneFor;
    }

    public function setNomeFor($nomeFor)
    {
        $this->nomeFor = $nomeFor;

    }
    public function getNomeFor()
    {
        return $this->nomeFor;
    }


}

?>