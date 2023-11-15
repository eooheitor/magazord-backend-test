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
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Cpf</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pessoas as $pessoa) : ?>
                  <tr>
                    <th scope="row"><?php echo $pessoa->getId() ?></th>
                    <td><?php echo $pessoa->getNome() ?></td>
                    <td><?php echo $pessoa->getCpf() ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <a href="/criar-pessoa"><button class="btn btn-primary">Cadastrar</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>