<?php

namespace Heitor\Mvc\Controller\Pessoas;

use Heitor\Mvc\Controller\ControllerRequisicao;

class Create implements ControllerRequisicao
{

  public function processaRequisicao(): void
  {
    $titulo = 'Criar Pessoa';
    include_once __DIR__. "/../../../view/pessoas/criar-pessoa.php";

  }

}