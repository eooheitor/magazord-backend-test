<?php

namespace Heitor\Mvc\Controller\Contatos;

use Heitor\Mvc\Controller\ControllerRequisicao;
use Heitor\Mvc\Infra\EntityManagerCreator;
use Heitor\Mvc\Model\Contato;

class excluirContato implements ControllerRequisicao
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
    // Pegar dados do formulário $_GET, usando filtros
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    // Redirecionar
    if (is_null($id) || $id === false) {
      header('Location: /listar-contato');
    }

    $contato = $this->entityManager->getReference(Contato::class, $id);

    $this->entityManager->remove($contato);
    $this->entityManager->flush();

    // Redirecionar para a página de listar contatos
    header('Location: /listar-contato');
  }
}
