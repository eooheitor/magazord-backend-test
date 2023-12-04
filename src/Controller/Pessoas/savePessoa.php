<?php

namespace Heitor\Mvc\Controller\Pessoas;

use Heitor\Mvc\Infra\EntityManagerCreator;
use Heitor\Mvc\Model\Pessoa;
use Heitor\Mvc\Controller\ControllerRequisicao;

class SavePessoa implements ControllerRequisicao
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
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Verificar se o CPF é válido
    if (!$this->validarCPF($cpf)) {
      header('Location: /criar-pessoa?cpf_error=true');
      return;
    }

    // Verificar se o CPF já existe no banco de dados
    if ($this->cpfJaExiste($cpf)) {
      echo 'CPF já existe no banco de dados';
      header('Location: /criar-pessoa?cpf_error=true');
      return;
    }


    // Montar modelo
    $pessoa = new Pessoa;
    $pessoa->setNome($nome);
    $pessoa->setCpf($cpf);

    // Atualizar
    // Pegar dados do formulário usando filtros
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if (!is_null($id) && $id !== false) {
      // Carregar a entidade existente do banco de dados
      $pessoaExistente = $this->entityManager->getReference(Pessoa::class, $id);

      // Aplicar as alterações
      $pessoaExistente->setNome($pessoa->getNome());
      $pessoaExistente->setCpf($pessoa->getCpf());

      // Mesclar com a entidade gerenciada
      $this->entityManager->merge($pessoaExistente);
    } else {
      // Inserir no banco
      $this->entityManager->persist($pessoa);
    }

    $this->entityManager->flush();

    // Redirecionar para outra página
    header('Location: /listar-pessoa', 302);
  }

  // Função para verificar se o CPF já existe no banco de dados
  private function cpfJaExiste($cpf): bool
  {
    $pessoaExistente = $this->entityManager->getRepository(Pessoa::class)->findOneBy(['cpf' => $cpf]);

    return $pessoaExistente !== null;
  }

  // Função para validar CPF

  private function validarCPF($cpf): bool
  {
    // Remover caracteres não numéricos
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    // Verificar se o CPF tem 11 dígitos
    if (strlen($cpf) !== 11) {
      return false;
    }

    // Verificar se todos os dígitos são iguais
    if (preg_match("/^{$cpf[0]}{11}$/", $cpf)) {
      return false;
    }

    // Calcular o primeiro dígito verificador
    $sum = 0;
    for ($i = 0; $i < 9; $i++) {
      $sum += intval($cpf[$i]) * (10 - $i);
    }
    $rest = $sum % 11;
    $digito1 = $rest < 2 ? 0 : 11 - $rest;

    // Calcular o segundo dígito verificador
    $sum = 0;
    for ($i = 0; $i < 10; $i++) {
      $sum += intval($cpf[$i]) * (11 - $i);
    }
    $rest = $sum % 11;
    $digito2 = $rest < 2 ? 0 : 11 - $rest;

    // Verificar se os dígitos calculados são iguais aos fornecidos
    return ($digito1 == $cpf[9]) && ($digito2 == $cpf[10]);
  }
}
