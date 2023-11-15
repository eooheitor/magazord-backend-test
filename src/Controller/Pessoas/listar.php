<?php

namespace Heitor\Mvc\Controller\Pessoas;

use Heitor\Mvc\Helper\EntityManagerFactory;
use Heitor\Mvc\Controller\ControllerRequisicao;
use Heitor\Mvc\Infra\EntityManagerCreator;
use Heitor\Mvc\Entity\Pessoa;

class Listar implements ControllerRequisicao
{

  private $repositorioDePessoas;

  public function __construct()
  {
    $entityManager = (new EntityManagerCreator())->getEntityManager();
    $this->repositorioDePessoas = $entityManager->getRepository(Pessoa::class);
  }

  public function processaRequisicao(): void
  {
    //Pegar no repositorio
    $pessoas = $this->repositorioDePessoas->findAll();
    $titulo = 'Pessoas';
    include_once __DIR__ . "/../../../view/pessoas/listar-pessoa.php";
  }
}
