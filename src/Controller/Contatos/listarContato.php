<?php

namespace Heitor\Mvc\Controller\Contatos;

use Heitor\Mvc\Helper\EntityManagerFactory;
use Heitor\Mvc\Controller\ControllerRequisicao;
use Heitor\Mvc\Infra\EntityManagerCreator;
use Heitor\Mvc\Model\Contato;

class listarContato implements ControllerRequisicao
{
  private $repositorioDeContatos;

  public function __construct()
  {
    $entityManager = (new EntityManagerCreator())->getEntityManager();
    $this->repositorioDeContatos = $entityManager->getRepository(Contato::class);
  }

  public function processaRequisicao(): void
  {
    // Pegar no repositório
    $contatos = $this->repositorioDeContatos->findAll();
    $titulo = 'Contatos';
    include_once __DIR__ . "/../../../view/contatos/listar-contato.php";
  }
}
