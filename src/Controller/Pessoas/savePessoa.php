<?php

namespace Heitor\Mvc\Controller\Pessoas;

use Doctrine\ORM\EntityManager;
use Heitor\Mvc\Infra\EntityManagerCreator;
use Heitor\Mvc\Entity\Pessoa;
use Heitor\Mvc\Controller\ControllerRequisicao;

class savePessoa implements ControllerRequisicao
{
  /**
   * @var \Doctrine\ORM\EntityManagerInterface
   */
  private $entityManager;

  public function __construct()
  {
    $this->entityManager = (new EntityManagerCreator())->getEntityManager();
  }

  public function processaRequisicao():void
  {
    //pegar dados do formulario $_POST, usando filtros

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);

    //montar modelo
    $pessoa = New Pessoa;
    $pessoa->setNome($nome);
    $pessoa->setCpf($cpf);

    //Inserir no banco
    $this->entityManager->persist($pessoa);
    $this->entityManager->flush();

    //redirecionar para outra pag
    header('Location: /listar-pessoa', 302);

  }

}