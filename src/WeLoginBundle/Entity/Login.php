<?php
/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 04/09/15
 * Time: 12:06
 */


namespace WeLoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



class Login
{
    /**
     * #ORM\
     * @Assert\Length(min=5)
     */
    private $nome;


    private $senha;

    public function setNome($nome)
    {
        $this-$nome = $nome;
        return $this;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getSenha()
    {
        return $this->senha;
    }

}