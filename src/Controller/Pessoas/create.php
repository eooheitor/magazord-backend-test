<?php

namespace Heitor\Mvc\Controller\Pessoas;

use Heitor\Mvc\Controller\ControllerRequisicao;
use Heitor\Mvc\Infra\EntityManagerCreator;
use Heitor\Mvc\Model\Pessoa;

class Create implements ControllerRequisicao
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
    $alertMessage = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Processar formulário se for uma requisição POST

      // Pegar dados do formulário $_POST, usando filtros
      $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
      $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);

      // Verificar se o CPF já existe no banco de dados
      $pessoaExistente = $this->entityManager->getRepository(Pessoa::class)->findOneBy(['cpf' => $cpf]);

      if ($pessoaExistente) {
     
        $alertMessage = 'CPF já cadastrado. Por favor, insira um CPF diferente.';
      } else {
        
        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setCpf($cpf);

        $this->entityManager->persist($pessoa);
        $this->entityManager->flush();
      }
    }

    $titulo = 'Criar Pessoa';
    include_once __DIR__ . "/../../../view/pessoas/criar-pessoa.php";
  }
}
