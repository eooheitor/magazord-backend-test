<?php

namespace Heitor\Mvc\Controller\Contatos;

use Heitor\Mvc\Controller\ControllerRequisicao;

class listarContato implements ControllerRequisicao
{

  public function processaRequisicao(): void
  {
    $titulo = 'Contatos';
    include_once __DIR__. "/../../../view/contatos/listar-contato.php";

  }

}