<?php

use Doctrine\ORM\EntityManager;
use Heitor\Mvc\Entity\Pessoa;
use Heitor\Mvc\Helper\EntityManagerFactory;

require_once __DIR__ . '/../../vendor/autoload.php';

// Gerenciar entidades das pessoas
$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

// Criar Repositorio de pessoas
$pessoaRepository = $entityManager->getRepository(Pessoa::class);

//Dados para exclusão, ID
$id = 1;

// Buscar pelo ID
$pessoa = $entityManager->getReference(Pessoa::class, $id);

//Verificar se existe
if (is_null($pessoa)){
  echo "<p>Pessoa inexistente</p>";
}

$entityManager->remove($pessoa); //Apagar Pessoa

$entityManager->flush($pessoa); //Confirmar Modificações