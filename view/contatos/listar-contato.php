<?php
include_once __DIR__ . '/../header.php';
?>

<main id="main">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?php echo $titulo ?></h5>

            <!-- Table with stripped rows -->
            <table class="table table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th scope="col">#</th>
                  <th scope="col">Tipo</th>
                  <th scope="col">Descrição</th>
                  <th scope="col">Pessoa</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($contatos as $contato) : ?>
                  <tr>
                    <td>
                      <a class="" href="/alterar-contato?id=<?= $contato->getId(); ?>"><i class="bi bi-pencil-square"></i></a>
                      <a class="text-red" href="/excluir-contato?id=<?= $contato->getId(); ?>"><i class="bi bi-trash"></i></a>&nbsp;
                    </td>
                    <th scope="row"><?php echo $contato->getId() ?></th>
                    <td><?php echo $contato->getTipo() ? 'Telefone' : 'E-mail'; ?></td>
                    <td><?php echo $contato->getDescricao() ?></td>
                    <td><?php echo $contato->getPessoa()->getNome() ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <a href="/criar-contato"><button class="btn btn-primary">Cadastrar</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>