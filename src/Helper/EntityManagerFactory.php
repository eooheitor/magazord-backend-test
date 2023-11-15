<?php

namespace Heitor\Mvc\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{

  /**
   * @return EntityManagerInterface
   * @throws \Doctrine\ORM\ORMException
   */

  public function getEntityManager(): EntityManagerInterface
  {
    $rootDir = __DIR__ . '/../..';
    $config = Setup::createAnnotationMetadataConfiguration(
      [$rootDir . "/src/Entity"],
      true,
      null,
      null,
      false  // Defina $useSimpleAnnotationReader como false
    );

    $connection = [
      'driver'   => 'pdo_mysql',
      'host'     => 'localhost', // ou o endereço do seu servidor MySQL
      'dbname'   => 'magazord', // substitua pelo nome do seu banco de dados MySQL
      'user'     => 'root',
      'password' => '',
      'charset'  => 'utf8mb4', // opcional, ajuste conforme necessário
  ];

    return EntityManager::create($connection, $config);
  }
}
