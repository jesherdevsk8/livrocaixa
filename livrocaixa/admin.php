<?php
  session_start();

  include('../lib/security.php');

  protegeLogin();

  // definição de timezone
  date_default_timezone_set('America/Sao_Paulo');

  $user_id        = $_SESSION['id'];
  $email          = $_SESSION['email'];
  $credencial     = $_SESSION['credencial'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include('layout/header.php'); ?>
  <title>Listagem</title>
  <style>
    .table-custom th {
      background-color: #f8f9fa;
      color: #212529;
    }
    .table-custom td {
      background-color: #ffffff;
      color: #212529;
    }
    .btn-custom {
      background-color: #e0e0e0;
      color: #212529;
      border: 1px solid #ccc;
    }
    .btn-custom:hover {
      background-color: #d0d0d0;
    }
  </style>
</head>
<body>
  <?php include('layout/navbar.php'); ?>
  <div class="container" style="padding-top:1.5em;">
    <div class="row">
      <div class="col-9">
        <h3>Planilhas Mensais</h3>
      </div>
      <div class="col-3">
        <input type="text" class="search-stock form-control mb-3" placeholder="Pesquisar planilha mensal...">
      </div>
    </div>
    <?php
      include("../config/connection.php");

      // Defina o número de resultados por página
      $results_per_page = 10;

      // Descubra em qual página o usuário está
      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

      // Calcule o valor do OFFSET
      $start_from = ($page - 1) * $results_per_page;

      // Execute a consulta SQL com a limitação para paginação
      $sql = "SELECT id, valor_total_entrada, soma_saidas, saldo_final, mes_referencia, created_at
              FROM planilha_mensal WHERE usuario_id = :user_id
              ORDER BY created_at DESC 
              LIMIT $results_per_page OFFSET $start_from";
      $consulta = $PDO->prepare($sql);
      $consulta->bindParam(':user_id', $user_id);
      $consulta->execute();

      if ($consulta->rowCount() > 0) {
        echo "<table class='table table-custom table-hover table-bordered'>
                <tr>
                  <th>Total Entradas</th>
                  <th>Total Saídas</th>
                  <th>Saldo A Transportar</th>
                  <th>Mês de referência</th>
                  <th>Data</th>
                  <th class='text-center'>PDF</th>
                </tr>";

        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $createdAt = DateTime::createFromFormat('Y-m-d H:i:s', $row["created_at"]);
          $formattedDate = $createdAt->format('d-m-Y');

          echo "<tr>
                  <td>" . number_format($row["valor_total_entrada"], 2, ',', '.') . "</td>
                  <td>" . number_format($row["soma_saidas"], 2, ',', '.') . "</td>
                  <td>" . number_format($row["saldo_final"], 2, ',', '.') . "</td>
                  <td>" . $row["mes_referencia"] . "</td>
                  <td>" . $formattedDate . "</td>
                  <td class='text-center'>
                    <form action='show_spreadsheet.php' method='POST' enctype='multipart/form-data'>
                      <input type='hidden' name='id' value='" . $row["id"] . "'>
                      <button type='submit' class='btn btn-custom'>Visualizar PDF</button>
                    </form>
                  </td>
                </tr>";
        }
        echo "</table>";

          // Descubra o número total de páginas
        $total_sql = "SELECT COUNT(*) FROM planilha_mensal";
        $total_result = $PDO->prepare($total_sql);
        $total_result->execute();
        $total_rows = $total_result->fetchColumn();
        $total_pages = ceil($total_rows / $results_per_page);

        // Exiba os links de paginação
        echo "<nav aria-label='Page navigation'>";
        echo "<ul class='pagination justify-content-center'>";

        if ($page > 1) {
            echo "<li class='page-item'><a class='page-link' href='admin.php?page=" . ($page - 1) . "'>Anterior</a></li>";
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<li class='page-item " . ($i == $page ? "active" : "") . "'><a class='page-link' href='admin.php?page=" . $i . "'>" . $i . "</a></li>";
        }

        if ($page < $total_pages) {
            echo "<li class='page-item'><a class='page-link' href='admin.php?page=" . ($page + 1) . "'>Próximo</a></li>";
        }

        echo "</ul>";
        echo "</nav>";
      } else {
        echo "Nenhum resultado encontrado.";
      }
    ?>
  </div>
</body>

<!-- Scripts JS -->
<?php include('layout/scripts.php'); ?>
</html>

<script>
  (function() {
    $(".search-stock").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  }).call(this);
</script>
