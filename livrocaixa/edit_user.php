<?php
  session_start();

  include("../config/connection.php");
  include('../lib/security.php');

  protegeLogin();

  // definição de timezone
  date_default_timezone_set('America/Sao_Paulo');

  $user_id        = $_SESSION['id'];
  $email          = $_SESSION['email'];
  $credencial     = $_SESSION['credencial'];

  // query de consulta
  $sql = "SELECT * FROM usuarios WHERE id = :id";
  $consulta = $PDO->prepare($sql);
  $consulta->bindParam(':id', $user_id);
  $result = $consulta->execute();
  $rows = $consulta->fetch(PDO::FETCH_ASSOC);

  $email = $rows['email'];

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <?php include("./layout/header.php"); ?>
    <title>Cadastro de Usuário</title>
  </head>
  <body>
    <?php include('../livrocaixa/layout/navbar.php'); ?>
    
    <div class="container d-flex justify-content-center align-items-center" style="margin-top: 50px;">
        <div class="card" style="width: 100%; max-width: 500px;">
            <div class="card-body">
                <h5 class="card-title text-center">Editar Usuário</h5>
                <form action="../livrocaixa/include/ajax/edit_user.php" id="editForm">
                    <div class="form-group">
                        <label for="email">Endereço de e-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" value="<?= $email ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmar Senha</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirme sua senha">
                    </div>
                    <input type="hidden" id="user_id" name="user_id" value="<?= $user_id ?>">
                    <button type="submit" class="btn btn-success btn-block" id="btn-submit" name="btn-submit">Editar</button>
                </form>
            </div>
        </div>
    </div>

    <?php include('./layout/scripts.php'); ?>
    <script src="js/edit_user.js"></script>
  </body>
</html>
