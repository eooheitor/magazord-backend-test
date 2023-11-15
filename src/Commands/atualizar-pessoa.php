<?php

use Doctrine\ORM\EntityManager;
use Heitor\Mvc\Entity\Pessoa;
use Heitor\Mvc\Helper\EntityManagerFactory;

require_once __DIR__ . '/../../vendor/autoload.php';

// Gerenciar entidades dos cursos
$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

// Criar Repositorio de pessoas
$pessoaRepository = $entityManager->getRepository(Pessoa::class);

// Dados para usar na atualização
$id = 1;
$novoNome = "HEITOOOOR";
$novoCpf = "000000000";

// Buscar pessoa pelo ID
$pessoa = $pessoaRepository->find($id);

// Verificar se a pessoa existe antes de tentar atualizá-la
if ($pessoa) {
    // Definir dados para atualizar
    $pessoa->setNome($novoNome);
    $pessoa->setCpf($novoCpf);

    $entityManager->flush(); // Confirmar modificações para o update
} else {
    echo "Pessoa não encontrada com o ID: $id";
}
