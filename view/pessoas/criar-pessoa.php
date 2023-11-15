<?php
include_once __DIR__ . '/../header.php';

?>
<main id="main">
  <div class="container">
    <div class="row mt-5">
      <div class="col-12">
        <form action="/salvar-pessoa<?php echo isset($pessoa) ? '?id=' . $pessoa->getId() : ''; ?>" method="POST">
          <div class="mb-3">
            <label for="" class="form-label">Nome</label>
            <input type="text" id="nome" class="form-control" name="nome" value="<?php echo isset($pessoa) ? $pessoa->getNome() : ''; ?>" required>

          </div>
          <div class="mb-3">
            <label for="" class="form-label">Cpf</label>
            <input type="text" id="cpf" class="form-control" name="cpf" value="<?php echo isset($pessoa) ? $pessoa->getCpf() : ''; ?>" required>
            <div id="cpf-error" style="color: red;"></div>
          </div>

          <?php
          if (isset($_GET['cpf_error']) && $_GET['cpf_error'] == 'true') {
            echo '<p style="color: red;">Erro: CPF já cadastrado no sistema ou inválido!</p>';
          }
          ?>
          <button type="submit" class="btn btn-primary" id="btnSalvar">
            <?php echo isset($pessoa) ? 'Salvar' : 'Cadastrar'; ?>
          </button>

        </form>
      </div>
    </div>
  </div>
</main>