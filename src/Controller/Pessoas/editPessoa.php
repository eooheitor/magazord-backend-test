<?php

namespace Heitor\Mvc\Controller\Pessoas;

use Doctrine\ORM\EntityManager;
use Heitor\Mvc\Model\Pessoa;
use Heitor\Mvc\Controller\ControllerRequisicao;
use Heitor\Mvc\Infra\EntityManagerCreator;

class editPessoa implements ControllerRequisicao
{
  /**
   * @var \Doctrine\Common\Persistence\ObjectRepository
   */

   private $repositorioPessoas;

   public function __construct()
   {
    $entityManager = (new EntityManagerCreator())->getEntityManager();
    $this->repositorioPessoas = $entityManager->getRepository(Pessoa::class);
   }

   public function processaRequisicao(): void
   {
    $id = filter_input(
      INPUT_GET,
      'id',
      FILTER_VALIDATE_INT
    );

    if(is_null($id) || $id === false) {
      header('Location: /listar-pessoa');
      return;
    }

    $pessoa = $this->repositorioPessoas->find($id);
    $titulo = "Atualizar Pessoa" . $pessoa->getNome();
    require __DIR__ . '/../../../view/pessoas/criar-pessoa.php'; 

   }
}