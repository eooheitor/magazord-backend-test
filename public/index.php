<?php

require __DIR__ . '/../vendor/autoload.php';

use Heitor\Mvc\Controller\Home;

use Heitor\Mvc\Controller\Pessoas\Listar;
use Heitor\Mvc\Controller\Pessoas\Create;
use Heitor\Mvc\Controller\Pessoas\savePessoa;

use Heitor\Mvc\Controller\Contatos\createContato;
use Heitor\Mvc\Controller\Contatos\listarContato;


switch (@$_SERVER['PATH_INFO']) {
  case '/listar-pessoa':
    $controlador = new Listar();
    $controlador->processaRequisicao();
    break;

  case '/criar-pessoa':
    $controlador = new Create();
    $controlador->processaRequisicao();
    break;

  case '/salvar-pessoa':
    $controlador = new savePessoa();
    $controlador->processaRequisicao();
    break;

  case '/listar-contato':
    $controlador = new listarContato();
    $controlador->processaRequisicao();
    break;

  case '/criar-contato':
    $controlador = new createContato();
    $controlador->processaRequisicao();
    break;

  case '':
  case '/':
  case '/index':
    $controlador = new Home();
    $controlador->processaRequisicao();
    break;

  default:
    echo "Erro 404 - Página não encontrada";
    break;
}
