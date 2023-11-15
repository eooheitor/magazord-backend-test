<?php

namespace Heitor\Mvc\Controller\Pessoas;

use Heitor\Mvc\Controller\ControllerRequisicao;
use Heitor\Mvc\Infra\EntityManagerCreator;
use Heitor\Mvc\Model\Pessoa;

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
    $termoPesquisa = filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING);

    // Se foi feita uma pesquisa, buscar pessoas pelo nome
    if ($termoPesquisa !== null && $termoPesquisa !== false) {
      $pessoas = $this->repositorioDePessoas->createQueryBuilder('p')
        ->where('p.nome LIKE :termo')
        ->setParameter('termo', '%' . $termoPesquisa . '%')
        ->getQuery()
        ->getResult();
    } else {
      // Caso contrário, buscar todas as pessoas
      $pessoas = $this->repositorioDePessoas->findAll();
    }

    $titulo = 'Pessoas';
    include_once __DIR__ . "/../../../view/pessoas/listar-pessoa.php";
  }
}
