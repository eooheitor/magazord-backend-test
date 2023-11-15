<?php
include_once __DIR__ . '/../header.php';
?>

<main id="main">
  <div class="container">
    <div class="row mt-5">
      <div class="col-12">
        <form action="/salvar-contato<?= isset($contato) && $contato->getId() !== null ? '?id=' . $contato->getId() : ''; ?>" method="POST">
          <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select id="tipo" class="form-select" name="tipo" required>
              <option value="" <?= !isset($contato) || $contato->getTipo() === null ? 'selected' : ''; ?>>Selecione</option>
              <option value="1" <?= isset($contato) && $contato->getTipo() === true ? 'selected' : ''; ?>>Telefone</option>
              <option value="0" <?= isset($contato) && $contato->getTipo() === false ? 'selected' : ''; ?>>E-mail</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" id="descricao" class="form-control" name="descricao" value="<?= isset($contato) ? $contato->getDescricao() : ''; ?>" required>
          </div>

          <div class="mb-3">
            <label for="" class="form-label">Selecione a Pessoa</label>
            <select id="idPessoa" class="form-select" name="idPessoa" required>
              <option value="" <?= !isset($contato) || $contato->getPessoa() === null ? 'selected' : ''; ?>>Selecione</option>
              <?php foreach ($pessoas as $pessoa) : ?>
                <option value="<?= $pessoa->getId(); ?>" <?= isset($contato) && $contato->getPessoa() !== null && $contato->getPessoa()->getId() == $pessoa->getId() ? 'selected' : ''; ?>>
                  <?= $pessoa->getNome(); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary" id="btnSalvar">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</main>