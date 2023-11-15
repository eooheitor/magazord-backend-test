<?php

use Doctrine\ORM\EntityManager;
use Heitor\Mvc\Helper\EntityManagerFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . '/vendor/autoload.php';


$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);

// executar comandos
//vendor\bin\doctrine.bat
//vendor\bin\doctrine list
//vendor\bin\doctrine.bat orm:info
//vendor\bin\doctrine.bat orm:mapping describe Pessoa
//entityName 
//CRIAR TABELAS MAPEADAS DAS CLASSES
//vendor\bin\doctrine.bat orm:schema-tool:create