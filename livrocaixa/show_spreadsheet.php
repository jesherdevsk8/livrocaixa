<?php
  include("../config/conexao.php");
  include("./layout/header.php");
  include("./include/date_format.php");

  $id = $_POST['id'];

  $sql = "SELECT * FROM planilha_mensal WHERE id = :id";
  $consulta = $PDO->prepare($sql);
  $consulta->bindParam(':id', $id, PDO::PARAM_INT);
  $consulta->execute();

  $row = $consulta->fetch(PDO::FETCH_ASSOC);
  
  function formatCurrency($value) {
    return number_format($value, 2, ',', '.');
  }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relatório Mensal</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .container {
      margin: 20 auto;
      padding-top: 1.5em;
    }
    h3, h4 {
      text-align: left;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 1em 0;
    }
    table, th, td {
      border: 1px solid #ddd;
    }
    th, td {
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    .data-element {
      font-weight: bold;
    }
    @media print {
      .container {
        padding-top: 0;
      }
      .table {
        border: 1px solid #000;
        border-collapse: collapse;
        width: 100%;
      }
      .table td, .table th {
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
      }
      .title {
        font-size: 18px;
        font-weight: bold;
      }
      .page-count {
        font-size: 12px;
        text-align: right;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h3>PLANILHA MENSAL IEQ REGIÃO 743 - PRÉVIA DO LIVRO CAIXA</h3>

    <?php 
      $currentMonth = date('M');
      $currentYear = date('Y');
    ?>
    <h3>Mês: <span id="month"><?php echo $currentMonthPortuguese; ?></span> 
        Ano: <span id="year"><?php echo $currentYear; ?></span>
    </h3><br>

    <div class="row">
      <div class="col-12">
        <h4>ENTRADAS:</h4>
        <table class="table border-1">
          <tbody>
            <tr>
              <td><b class="data-element">Saldo Mês Anterior:</b></td>
              <td><?php echo formatCurrency($row["saldo_mes_anterior"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Dízimos:</b></td>
              <td><?php echo formatCurrency($row["dizimos"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Ofertas Gerais:</b></td>
              <td><?php echo formatCurrency($row["ofertas_gerais"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Ofertas Especiais:</b></td>
              <td><?php echo formatCurrency($row["ofertas_especiais"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Ofertas Terceiro Domingo:</b></td>
              <td><?php echo formatCurrency($row["ofertas_terceiro_domingo"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Doações:</b></td>
              <td><?php echo formatCurrency($row["doacoes"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Valor Total Entrada:</b></td>
              <td><?php echo formatCurrency($row["valor_total_entrada"]); ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <h4>SAÍDAS:</h4>
        <table class="table">
          <tbody>
            <tr>
              <td><b class="data-element">Taxas 4% da Região:</b></td>
              <td><?php echo formatCurrency($row["taxa_da_regiao"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Taxas 4% CND:</b></td>
              <td><?php echo formatCurrency($row["taxa_cnd"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Taxa 1% Fundo Social CND:</b></td>
              <td><?php echo formatCurrency($row["taxa_fundo_social_cnd"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Taxa Oferta Missões CND:</b></td>
              <td><?php echo formatCurrency($row["taxa_oferta_missoes_cnd"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Taxa 3% FIRE:</b></td>
              <td><?php echo formatCurrency($row["taxa_fire"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Taxa 4% CED:</b></td>
              <td><?php echo formatCurrency($row["taxa_ced"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Taxa Oferta Missões CED:</b></td>
              <td><?php echo formatCurrency($row["taxa_oferta_missoes_ced"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Honorários:</b></td>
              <td><?php echo formatCurrency($row["honorarios"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Água:</b></td>
              <td><?php echo formatCurrency($row["agua"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Energia Elétrica:</b></td>
              <td><?php echo formatCurrency($row["energia_eletrica"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Aluguel:</b></td>
              <td><?php echo formatCurrency($row["aluguel"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Despesas de Mercado:</b></td>
              <td><?php echo formatCurrency($row["despesas_de_mercado"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Internet:</b></td>
              <td><?php echo formatCurrency($row["internet"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Sustento Pastoral:</b></td>
              <td><?php echo formatCurrency($row["sustento_pastoral"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Despesas Bancárias:</b></td>
              <td><?php echo formatCurrency($row["despesas_bancarias"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Outras Saídas:</b></td>
              <td><?php echo formatCurrency($row["outras_saidas"]); ?></td>
            </tr>
            <tr>
              <td><b class="data-element">Soma Saídas:</b></td>
              <td><?php echo formatCurrency($row["soma_saidas"]); ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <h4>SALDO FINAL::</h4>
        <table class="table">
          <tbody>
            <tr>
              <td><b class="data-element">Soma</b></td>
              <td><?php echo formatCurrency($row["saldo_final"]); ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
      window.onload = function() {
        window.print();
      }
    </script>
</body>
</html>
