<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 1px solid #dee2e6;">
  <a class="navbar-brand" href="admin.php">Planilha Mensal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../livrocaixa/form.php">Nova planilha<span class="sr-only">(current)</span></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $_SESSION['email'] ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="edit_user.php">Perfil</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="include/logout.php">Sair</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
