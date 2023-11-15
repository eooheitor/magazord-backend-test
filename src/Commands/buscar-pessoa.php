<?php

use Doctrine\ORM\EntityManager;
use Heitor\Mvc\Entity\Pessoa;
use Heitor\Mvc\Helper\EntityManagerFactory;

require_once __DIR__ . '/../../vendor/autoload.php';

//Gerenciar entidades dos cursos
$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

//Criar Repositórios de cursos
$pessoaRepository = $entityManager->getRepository(Pessoa::class);

/**
 * #var Pessoa[] $pessoaList
 */
$pessoaList = $pessoaRepository->findAll(); //Buscar todos

foreach ($pessoaList as $pessoa) {
  echo "<p>ID: {$pessoa->getId()}</p>
  <p>Nome: {$pessoa->getNome()}</p>
  <p>Cpf: {$pessoa->getCpf()}</p>";
}
/*
//Buscar por ID
$busca1 = $pessoaRepository->find(1);
echo "<p> {$busca1->getNome()}</p>";

//Busca por todos com o nome
$busca2 = $pessoaRepository->findBy([
  'nome' => 'Heitor'
]);


var_dump($busca2);

echo "<hr>";

$busca3 = $pessoaRepository->findOneBy([
  'nome' => 'Heitor'
]);

var_dump($busca3);
*/