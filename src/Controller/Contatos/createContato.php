<?php

namespace Heitor\Mvc\Controller\Contatos;

use Heitor\Mvc\Controller\ControllerRequisicao;
use Heitor\Mvc\Infra\EntityManagerCreator;
use Heitor\Mvc\Model\Pessoa;

class createContato implements ControllerRequisicao
{

  /**
   * @var \Doctrine\ORM\EntityManagerInterface
   */
  private $entityManager;

  public function __construct()
  {
    $this->entityManager = (new EntityManagerCreator())->getEntityManager();
  }

  public function processaRequisicao(): void
  {
    $pessoas = $this->entityManager->getRepository(Pessoa::class)->findAll();
    $titulo = 'Criar Contato';
    include_once __DIR__ . "/../../../view/contatos/criar-contato.php";
  }
}
