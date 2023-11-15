<?php

namespace Heitor\Mvc\Controller\Pessoas;

use Heitor\Mvc\Controller\ControllerRequisicao;
use Heitor\Mvc\Infra\EntityManagerCreator;
use Heitor\Mvc\Model\Pessoa;

class excluirPessoa implements ControllerRequisicao
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

    // Redirecionar se o ID for inválido
    if (is_null($id) || $id === false) {
      header('Location: /listar-pessoa');
      return;
    }

    // Verificar se a pessoa está associada a algum contato usando DQL
    $dql = "SELECT c FROM Heitor\Mvc\Model\Contato c WHERE c.pessoa = :pessoaId";
    $query = $this->entityManager->createQuery($dql);
    $query->setParameter('pessoaId', $id);
    $contatosAssociados = $query->getResult();

    if (!empty($contatosAssociados)) {
      // Se existem contatos associados, redirecione com uma mensagem de erro
      header('Location: /listar-pessoa?error=assoc_contatos');
      return;
    }

    // Remover a pessoa se não houver contatos associados
    $pessoa = $this->entityManager->getReference(Pessoa::class, $id);
    $this->entityManager->remove($pessoa);
    $this->entityManager->flush();

    // Redirecionar para a página de listar-pessoa
    header('Location: /listar-pessoa');
  }
}
