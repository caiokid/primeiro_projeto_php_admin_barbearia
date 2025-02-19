<section class="bread">
  <div class="container">
    <ol class="breadcrumb">
      <li class="active">Home</li>
    </ol>
  </div>
</section>

<section class="principal">

  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
          <form method="post">
            <button name="equipe" class="list-group-item">Equipe</button>
            <button name="serviços" class="list-group-item"><a
                style="text-decoration:none;color: black;">Serviços</a></button>
            <button name="agendados" class="list-group-item"><a
                style="text-decoration:none;color: black;">Horários</a></button>
            <button name="atendidos" class="list-group-item"><a
                style="text-decoration:none;color: black;">Atendidos</a></button>
            <button name="desmarcados" class="list-group-item"><a
                style="text-decoration:none;color: black;">Desmarcados</a></button>
          </form>
        </div>
      </div>
      <div class="col-md-9">
        <?php
        if (isset($_POST['equipe'])) {

          ?>
          <div id="cadastrar_equipe_section" class="panel panel-default">
            <div class="panel-heading cor-padrao">
              <h3 class="panel-title">Cadastrar Equipe:</h3>
            </div>
            <div class="panel-body">
              <form method="post">
                <div class="form-group">
                  <label for="email">Nome do Funcionario:</label>
                  <input type="text" name="nome" class="form-control" />
                  <br>
                  <label for="email">Email:</label>
                  <input type="text" name="email" class="form-control" />
                  <label for="email">Senha:</label>
                  <input type="text" name="senha" class="form-control" />
                </div>
                <div class="form-group">
                  <label for="email">Foto do funcionario:</label>

                  <input type="file" name="imagem">
                </div>
                <input type="hidden" name="cadastrar_equipe" />

                <button name="cadastrar" type="submit" class="btn btn-default">Cadastrar</button>
              </form>
            </div>
          </div>
          <div id="lista_equipe_section" class="panel panel-default">
            <div class="panel-heading cor-padrao">
              <h3 class="panel-title">Membros da equipe:</h3>
            </div>
            <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>ID:</th>
                    <th>Nome do membro</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $selecionarMembros = \MySql::connect()->prepare("SELECT * FROM funcionarios");
                  $selecionarMembros->execute();
                  $membros = $selecionarMembros->fetchAll();
                  foreach ($membros as $key => $value) {
                    ?>
                    <tr>
                      <td><?php echo $value['id_funcionario']; ?></td>
                      <td><?php echo $value['nome_funcionario'] ?></td>
                      <td><button type="button" class="deletar-membro btn btn-sm btn-danger"><a style="color:white;"
                            href="?id=<?php echo $value['id_funcionario'] ?>">Excluir</a></button></td>
                    </tr>

                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <?php
        } else if (isset($_POST['serviços'])) {
          ?>
            <div id="cadastrar_equipe_section" class="panel panel-default">
              <div class="panel-heading cor-padrao">
                <h3 class="panel-title">Cadastrar Serviços:</h3>
              </div>
              <div class="panel-body">
                <form method="post">
                  <div class="form-group">
                    <label for="email">Serviço:</label>
                    <input required type="text" name="servico" class="form-control" />
                    <label for="email">Preço:</label>
                    <input required type="text" name="preco" class="form-control" />
                  </div>
                  <button name="cadastrar_servico" type="submit" class="btn btn-default">Cadastrar</button>
                </form>
              </div>
            </div>
            <div id="lista_equipe_section" class="panel panel-default">
              <div class="panel-heading cor-padrao">
                <h3 class="panel-title">Tipos de serviços:</h3>
              </div>
              <div class="panel-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID:</th>
                      <th>Nome do Serviço</th>
                      <th>Preço</th>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $selecionarMembros = \MySql::connect()->prepare("SELECT * FROM servicos");
                    $selecionarMembros->execute();
                    $membros = $selecionarMembros->fetchAll();
                    foreach ($membros as $key => $value) {
                      ?>
                      <tr>
                        <td><?php echo $value['id_servicos']; ?></td>
                        <td><?php echo $value['servico'] ?></td>
                        <td><?php echo $value['preco'] ?></td>
                        <td><button type="button" class="deletar-membro btn btn-sm btn-danger"><a
                              href="?id_servico=<?php echo $value['id_servicos'] ?>">Excluir</a></button></td>
                        <style>
                          a {
                            text-decoration: none;
                            color: white;
                          }
                        </style>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          <?php
        } else if (isset($_POST['agendados'])) {
          $sql = \MySql::connect()->prepare("SELECT * FROM tb_agendados INNER JOIN servicos ON tb_agendados.id_servicos = servicos.id_servicos INNER JOIN clientes ON tb_agendados.id_usuario = clientes.id_cliente INNER JOIN funcionarios ON tb_agendados.id_funcionario = funcionarios.id_funcionario WHERE tb_agendados.id_funcionario  = tb_agendados.id_funcionario ");
          $sql->execute();
          if ($sql->rowCount() == 0) {
            echo '<div class="nadamarcado">Nada está  marcado</div>';
          } else {
            ?>
                <div id="lista_equipe_section" class="panel panel-default">
                  <div class="panel-heading cor-padrao">
                    <h3 class="panel-title">Horários de hoje:</h3>
                  </div>
                  <div class="panel-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nome do Cliente:</th>
                          <th>Data e Hora</th>
                          <th>Nome do Funcionário:</th>
                          <th>Preço</th>
                          <th>Botões</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php

                      foreach ($sql as $key => $value) {
                        ?>
                          <tr>
                            <style>
                              a {
                                text-decoration: none;
                                color: white;
                              }
                            </style>
                            <td><?php echo $value['nome']; ?></td>
                            <td><?php echo date('d/m/Y H:i:s', strtotime($value['horario'])); ?></td>
                            <td><?php echo $value['nome_funcionario']; ?></td>
                            <td><?php echo $value['preco']; ?></td>
                            <td><button type="button" class="deletar-membro btn btn-sm btn-danger"><a
                                  style="text-decoration: none"
                                  href="?desmarcado=<?php echo $value['id_agenda'] ?>">Desmarcar</a></button>
                              <br>
                              <br>
                              <button style="background-color:green; width: 75%;" type="button"
                                class="deletar-membro btn btn-sm btn-danger"><a style="text-decoration:none;"
                                  href="?atendido=<?php echo $value['id_agenda'] ?>">Concluido</a></button>
                            </td>
                            <td></td>
                          </tr>
                    <?php }
          } ?>
                    </tbody>
                  </table>
                </div>
              </div>
        <?php } else if (isset($_POST['atendidos'])) {
          ?>
                <div class="expediente">
                  <h2>Atendidos durante o expediente:</h2>

              <?php

              $views = \MySql::connect()->prepare("SELECT * FROM `atendidos` WHERE views = 1");
              $views->execute();

              if ($views->columnCount() == 0) {
                echo 'Nada ainda';
              } else {
                echo '<h3>Foram Atendidos ' . $views->rowCount() . ' clientes</h3>';
              }

              ?>

                </div>
            <?php
            $sql = \MySql::connect()->prepare("SELECT `id_atendidos`, `id_agenda`, `usuario`, `funcionario`, `servico`, `horario`, `status` FROM `atendidos` WHERE views = 1");
            $sql->execute();
            if ($sql->rowCount() == 0) {
              echo '<div class="nadamarcado">Nada foi agendado por enquanto</div>';
            } else {
              foreach ($sql as $key => $value) {
                ?>
                    <div class="selectradius">
                      <div class="opa"> Cliente: <?php echo $value['usuario'] ?><br /> </div>
                      <div class="opa">Data e Horário: <?php echo date('d/m/Y H:i:s', strtotime($value['horario'])); ?></div>
                      <div class="opa">Funcionário: <?php echo $value['funcionario']; ?> </div>
                      <div class="desmarcado"><a href="?deletaratendido=<?php echo $value['id_atendidos']; ?>">Deletar</a></div>
                    </div>
              <?php
              }
            }
        } else if (isset($_POST['desmarcados'])) {
          ?>
                  <div class="expediente">
                    <h2>Desmarcados:</h2>

              <?php

              $views = \MySql::connect()->prepare("SELECT * FROM `desmarcados` WHERE views = 1");
              $views->execute();

              if ($views->columnCount() == 0) {
                echo 'Nada ainda';
              } else {
                echo '<h3>Número de Desmarcados ' . $views->rowCount() . ' clientes</h3>';
              }

              ?>

                  </div>
            <?php
            $sql = \MySql::connect()->prepare("SELECT `id_desmarcados`, `id_agenda`, `usuario`, `funcionario`, `servicos`, `horario`, `status` FROM `desmarcados` WHERE views = 1");
            $sql->execute();
            if ($sql->rowCount() == 0) {
              echo '<div class="nadamarcado">Nada foi agendado por enquanto</div>';
            } else {
              foreach ($sql as $key => $value) {
                ?>
                      <div class="selectradius">
                        <div class="opa"> Cliente: <?php echo $value['usuario'] ?><br /> </div>
                        <div class="opa">Data e Horário: <?php echo date('d/m/Y H:i:s', strtotime($value['horario'])); ?></div>
                        <div class="opa">Funcionário: <?php echo $value['funcionario']; ?> </div>
                        <div class="desmarcado"><a href="?deletardesmarcados=<?php echo $value['id_desmarcados']; ?>">Deletar</a>
                        </div>
                      </div>
              <?php
              }
            }
        }
        ?>
      </div>
    </div>
  </div>
</section>
</div>
</body>

</html>

<?php
\controllers\AdminController::CadastrarFuncionario();
\controllers\AdminController::DeletarFuncionario();






\controllers\AdminController::CadastrarServicos();
\controllers\AdminController::DeletarServico();



\controllers\AdminController::Desmarcadoo();
\controllers\AdminController::DeletarDesmarcadoo();




\controllers\AdminController::Atendido();
\controllers\AdminController::DeletarAtendido();
?>