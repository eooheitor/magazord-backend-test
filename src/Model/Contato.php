<?php

namespace Heitor\Mvc\Model;

use Doctrine\ORM\Mapping as ORM;
use Heitor\Mvc\Model\Pessoa;

/**
 * @ORM\Entity
 * @ORM\Table(name="contato")
 */
class Contato
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="boolean")
   */
  private $tipo;

  /**
   * @ORM\Column(type="string")
   */
  private $descricao;

  /**
   * @ORM\ManyToOne(targetEntity="Pessoa", inversedBy="contatos")
   * @ORM\JoinColumn(name="id_pessoa", referencedColumnName="id")
   */
  private $pessoa;

  // Getters e Setters

  public function getId(): ?int
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }


  public function getTipo(): ?bool
  {
    return $this->tipo;
  }

  public function setTipo(bool $tipo): self
  {
    $this->tipo = $tipo;

    return $this;
  }

  public function getDescricao(): ?string
  {
    return $this->descricao;
  }

  public function setDescricao(string $descricao): self
  {
    $this->descricao = $descricao;

    return $this;
  }

  public function getPessoa(): ?Pessoa
  {
    return $this->pessoa;
  }

  public function setPessoa(?Pessoa $pessoa): self
  {
    $this->pessoa = $pessoa;

    return $this;
  }
}
