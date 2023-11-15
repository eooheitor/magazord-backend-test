<?php

use Heitor\Mvc\Controller\Contatos\createContato;
use Heitor\Mvc\Controller\Contatos\listarContato;
use Heitor\Mvc\Controller\Contatos\saveContato;
use Heitor\Mvc\Controller\Contatos\editContato;
use Heitor\Mvc\Controller\Contatos\excluirContato;
use Heitor\Mvc\Controller\Pessoas\Listar;
use Heitor\Mvc\Controller\Pessoas\Create;
use Heitor\Mvc\Controller\Pessoas\savePessoa;
use Heitor\Mvc\Controller\Pessoas\excluirPessoa;
use Heitor\Mvc\Controller\Pessoas\editPessoa;
use Heitor\Mvc\Controller\Home;

return [
  ''                => Home::class,
  '/'               => Home::class,
  '/index'          => Home::class,
  '/listar-pessoa'  => Listar::class,
  '/criar-pessoa'   => Create::class,
  '/salvar-pessoa'  => savePessoa::class,
  '/excluir-pessoa' => excluirPessoa::class,
  '/alterar-pessoa' => editPessoa::class,
  '/listar-contato'  => listarContato::class,
  '/criar-contato'   => createContato::class,
  '/salvar-contato'  => saveContato::class,
  '/excluir-contato' => excluirContato::class,
  '/alterar-contato' => editContato::class,
];
