<?php
  session_start();

  if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
      header("Location: livrocaixa/admin.php");
      exit;
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>livrocaixa</title>
      <?php include('livrocaixa/layout/header.php'); ?>
  </head>
  <body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h5 class="card-title text-center">Livro Caixa Login</h5>
                <form action="livrocaixa/include/ajax/check_login.php" id="loginForm">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="btn-summit">Entrar</button>
                </form>
                <br>
            </div>
        </div>
    </div>

    <?php include('livrocaixa/layout/scripts.php'); ?>
    <script src="livrocaixa/js/check_login.js"></script>
  </body>
</html>

