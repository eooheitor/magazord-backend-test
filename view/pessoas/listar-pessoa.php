<?php include_once __DIR__ . '/../header.php'; ?>

<main id="main">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php if (isset($_GET['error']) && $_GET['error'] === 'assoc_contatos') : ?>
          <div class="alert alert-danger" role="alert">
            Esta pessoa não pode ser excluída, pois está associada a um ou mais contatos.
          </div>
        <?php endif; ?>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?php echo $titulo ?></h5>

            <!-- Formulário de Pesquisa -->
            <form action="/listar-pessoa" method="GET" class="mb-3">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Pesquisar por nome" name="s">
                <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
              </div>
            </form>

            <!-- Tabela com linhas listradas -->
            <table class="table table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Cpf</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pessoas as $pessoa) : ?>
                  <tr>
                    <td>
                      <a class="" href="/alterar-pessoa?id=<?= $pessoa->getId(); ?>"><i class="bi bi-pencil-square"></i></a>
                      <a class="text-red ml-3" href="/excluir-pessoa?id=<?= $pessoa->getId(); ?>"><i class="bi bi-trash"></i></a>&nbsp;
                    </td>
                    <th scope="row"><?php echo $pessoa->getId() ?></th>
                    <td><?php echo $pessoa->getNome() ?></td>
                    <td><?php echo $pessoa->getCpf() ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <a href="/criar-pessoa"><button class="btn btn-primary">Cadastrar</button></a>
            <?php
            if (!empty($_GET['s'])) { ?>
              <a href="/listar-pessoa"><button class="btn btn-primary ml-5">Ver todos</button></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>