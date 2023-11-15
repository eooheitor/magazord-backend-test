<?php

namespace Heitor\Mvc\Controller\Contatos;

use Heitor\Mvc\Controller\ControllerRequisicao;

class createContato implements ControllerRequisicao
{

  public function processaRequisicao(): void
  {
    $titulo = 'Criar Contato';
    include_once __DIR__. "/../../../view/contatos/criar-contato.php";

  }

}