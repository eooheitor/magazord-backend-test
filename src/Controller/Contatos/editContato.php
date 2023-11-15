<?php

namespace Heitor\Mvc\Controller\Contatos;

use Heitor\Mvc\Controller\ControllerRequisicao;
use Heitor\Mvc\Infra\EntityManagerCreator;
use Heitor\Mvc\Model\Contato;
use Heitor\Mvc\Model\Pessoa;

class editContato implements ControllerRequisicao
{
  /**
   * @var \Doctrine\ORM\EntityManagerInterface
   */
  private $entityManager;

  private $repositorioContatos;

  public function __construct()
  {
    $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    $this->repositorioContatos = $this->entityManager->getRepository(Contato::class);
  }

  public function processaRequisicao(): void
  {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if (is_null($id) || $id === false) {
      header('Location: /listar-contato');
      return;
    }

    $contato = $this->repositorioContatos->find($id);
    $pessoas = $this->entityManager->getRepository(Pessoa::class)->findAll();
    $titulo = "Atualizar Contato";
    require __DIR__ . '/../../../view/contatos/criar-contato.php';
  }
}
