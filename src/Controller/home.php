<?php

namespace Heitor\Mvc\Controller;

use Heitor\Mvc\Controller\ControllerRequisicao;

class Home implements ControllerRequisicao
{

  public function processaRequisicao(): void
  {
    $titulo = 'Painel MVC Magazord';
    include_once __DIR__ . "../../../view/home.php";
  }
}
