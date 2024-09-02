<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include('livrocaixa/layout/header.php'); ?>
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
  <?php include('livrocaixa/layout/navbar.php'); ?>
  <div class="container" style="padding-top:1.5em;">
    <div class="row">
      <div class="col-9">
        <h3>Planilhas Mensais</h3>
      </div>
      <div class="col-3">
        <input type="text" class="search-stock form-control mb-3" placeholder="Pesquisar item...">
      </div>
    </div>
    <?php
      include("config/conexao.php");

      $sql = "SELECT id, valor_total_entrada, soma_saidas, saldo_final, created_at FROM planilha_mensal ORDER BY created_at DESC";
      $consulta = $PDO->prepare($sql);
      $consulta->execute();

      if ($consulta->rowCount() > 0) {
        echo "<table class='table table-custom table-hover table-bordered'>
                <tr>
                  <th>Total Entradas</th>
                  <th>Total Saídas</th>
                  <th>Saldo A Transportar</th>
                  <th>Data</th>
                  <th class='text-center'>PDF</th>
                </tr>";

        while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $createdAt = DateTime::createFromFormat('Y-m-d H:i:s', $row["created_at"]);
          $formattedDate = $createdAt->format('d-m-Y');

          echo "<tr>
                  <td>" . number_format($row["valor_total_entrada"], 2, ',', '.') . "</td>
                  <td>" . number_format($row["soma_saidas"], 2, ',', '.') . "</td>
                  <td>" . number_format($row["saldo_final"], 2, ',', '.') . "</td>
                  <td>" . $formattedDate  . "</td>
                  <td class='text-center'>
                    <form action='livrocaixa/show_spreadsheet.php' method='POST' enctype='multipart/form-data'>
                      <input type='hidden' name='id' value='" . $row["id"] . "'>
                      <button type='submit' class='btn btn-custom'>Visualizar PDF</button>
                    </form>
                  </td>
                </tr>";
        }
        echo "</table>";
      } else {
        echo "Nenhum resultado encontrado.";
      }
    ?>
  </div>
</body>

<!-- Scripts JS -->
<?php include('livrocaixa/layout/scripts.php'); ?>
</html>

<script>
  (function(){
    $(".search-stock").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  }).call(this);
</script>
