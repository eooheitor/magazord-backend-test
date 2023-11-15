<?php

use Heitor\Mvc\Helper\EntityManagerFactory;
use Heitor\Mvc\Entity\Pessoa;

require_once __DIR__ . '/../../vendor/autoload.php';

// Gerenciar Entidades Cursos
$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

// Verificar se o CPF já está cadastrado


// Cria uma nova pessoa
// $pessoa1 = new Pessoa();
// $pessoa1->setNome('Heitor');
// $pessoa1->setCpf('02447668007');
// $entityManager->persist($pessoa1);
// $entityManager->flush();

$pessoa2 = new Pessoa();
$pessoa2->setNome('Adriane');
$pessoa2->setCpf('13879913960');
$entityManager->persist($pessoa2);
$entityManager->flush();


//Gerenciar Entidades Cursos
$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

//Doctrine observa as modificações na entidade
$entityManager->persist($pessoa2);

//Doctrine salva as modificações na base de dados = INSERT,flush = descarga
$entityManager->flush();
