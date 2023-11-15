<?php

namespace Heitor\Mvc\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
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
      'host'     => 'localhost', 
      'dbname'   => 'magazord', 
      'user'     => 'root',
      'password' => '',
      'charset'  => 'utf8mb4', 
    ];

    return EntityManager::create($connection, $config);
  }
}
