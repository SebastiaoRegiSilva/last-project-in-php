<?php
require_once("Cabecalho.php");
?>

<?php
if ($niveluser == 'A') { ?>
  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col">
        <div class="card shadow">
          <div class="card-header border-1">
            <h3 class="mb-0">Cadastro de Usuário</h3>
          </div>
          <div class="container" style="margin-top: 20px;">
            <form action="usuario.php" method="POST">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Login:</label>
                    <input type="text" class="form-control form-control-alternative" placeholder="Digite o login..." name="login" required="" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Senha:</label>
                    <input type="password" class="form-control form-control-alternative" placeholder="Mínimo 6 digitos..." name="password" required="" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Permissão Usuário:</label>
                    <br>
                    <select class="form-control" name="permissao" required="" id="exampleFormControlSelect1">
                      <br>
                      <option>A</option>
                      <option>C</option>
                    </select>
                  </div>
                </div>
              </div>
          </div>
          <div class="card-footer py-4">
            <div style="text-align: left"><br>
              <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<?php
if ($niveluser != 'A') { ?>
  <h3 class="mb-0">HAHA, VOCÊ NÃO PODE FICA AQUI VOLTE!</h3>
<?php } ?>
</body>

</html>
