<?php
include_once __DIR__ . '/../header.php';
?>
<main id="main">
  <div class="container">
    <div class="row mt-5">
      <div class="col-12">
        <form action="/salvar-pessoa" method="POST">
          <div class="mb-3">
            <label for="" class="form-label">Nome</label>
            <input type="text" id="nome" class="form-control" name="nome">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Cpf</label>
            <input type="text" id="cpf" class="form-control" name="cpf">
          </div>
          <button type="submit" class="btn btn-primary" id="btnSalvar">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>
</main>