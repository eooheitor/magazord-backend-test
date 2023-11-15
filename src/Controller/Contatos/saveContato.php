<?php

namespace Heitor\Mvc\Controller\Contatos;

use Doctrine\ORM\EntityManager;
use Heitor\Mvc\Infra\EntityManagerCreator;
use Heitor\Mvc\Model\Contato;
use Heitor\Mvc\Model\Pessoa;
use Heitor\Mvc\Controller\ControllerRequisicao;

class saveContato implements ControllerRequisicao
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
    // Pegar dados do formulário $_POST, usando filtros
    $tipo = filter_input(INPUT_POST, 'tipo', FILTER_VALIDATE_BOOLEAN);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    $idPessoa = filter_input(INPUT_POST, 'idPessoa', FILTER_VALIDATE_INT);

    // Montar modelo
    $contato = new Contato();
    $contato->setTipo($tipo);
    $contato->setDescricao($descricao);
    

    if (!is_null($idPessoa) && $idPessoa !== false) {
      // Carregar a entidade existente do banco de dados
      $pessoaExistente = $this->entityManager->getReference(Pessoa::class, $idPessoa);
      $contato->setPessoa($pessoaExistente);
    }

    // Atualizar
    // Pegar dados do formulário usando filtros
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if (!is_null($id) && $id !== false) {
      // Carregar a entidade existente do banco de dados
      $contatoExistente = $this->entityManager->getReference(Contato::class, $id);

      // Aplicar as alterações
      $contatoExistente->setTipo($contato->getTipo());
      $contatoExistente->setDescricao($contato->getDescricao());
      $contatoExistente->setPessoa($contato->getPessoa());

      // Mesclar com a entidade gerenciada
      // Mesclar com a entidade gerenciada
      $this->entityManager->merge($contatoExistente);
    } else {
      // Inserir no banco
      $this->entityManager->persist($contato);
    }

    $this->entityManager->flush();

    // Redirecionar para outra página
    header('Location: /listar-contato', 302);
  }
}
