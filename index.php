<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include('livrocaixa/layout/header.php'); ?>
  <title>Listagem</title>
  <style>
    /* Adicionando estilo CSS para a tabela */
    .table-custom th {
      background-color: #f8f9fa; /* Cor de fundo neutra */
      color: #212529; /* Cor do texto escura */
    }
    .table-custom td {
      background-color: #ffffff; /* Cor de fundo branca */
      color: #212529; /* Cor do texto escura */
    }
    .btn-custom {
      background-color: #e0e0e0; /* Cor de fundo cinza claro */
      color: #212529; /* Cor do texto escura */
      border: 1px solid #ccc; /* Borda cinza clara */
    }
    .btn-custom:hover {
      background-color: #d0d0d0; /* Cor de fundo cinza um pouco mais escuro ao passar o mouse */
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

      $sql = "SELECT id, valor_total_entrada, soma_saidas, created_at FROM planilha_mensal ORDER BY created_at DESC";
      $consulta = $PDO->prepare($sql);
      $consulta->execute();

      if ($consulta->rowCount() > 0) {
        echo "<table class='table table-custom table-hover table-bordered'>
                <tr>
                  <th>Valor Total Entrada</th>
                  <th>Soma Saídas</th>
                  <th>Criado em</th>
                  <th class='text-center'>PDF</th>
                </tr>";
        // output data of each row
        while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr>
                  <td>" . number_format($row["valor_total_entrada"], 2, ',', '.') . "</td>
                  <td>" . number_format($row["soma_saidas"], 2, ',', '.') . "</td>
                  <td>" . $row["created_at"] . "</td>
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
