<?php include("./include/date_format.php"); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include("./layout/header.php"); ?>
  <title>Cadastro</title>
</head>
<body>
  <?php include('../livrocaixa/layout/navbar.php'); ?>
  <div class="container" style="padding-top:1.5em;">
    <form action="../livrocaixa/form_process.php" method="POST" enctype="multipart/form-data">
      <h3>PLANILHA MENSAL IEQ REGIÃO 743 - PRÉVIA DO LIVRO CAIXA</h3>

      <?php 
        $currentMonth = date('M');
        $currentYear = date('Y');
      ?>
      <h3>Mês: <span id="month"><?php echo $currentMonthPortuguese; ?></span>
        Ano: <span id="year"><?php echo $currentYear; ?></span>
      </h3><br>

      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="saldo_mes_anterior">Saldo á Transportar Mês Anterior:</label>
            <input type="text" name="saldo_mes_anterior" id="saldo_mes_anterior" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="dizimos">Dízimos:</label>
            <input type="text" name="dizimos" id="dizimos" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="ofertas_gerais">Ofertas Gerais:</label>
            <input type="text" name="ofertas_gerais" id="ofertas_gerais" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="ofertas_especiais">Ofertas Especiais:</label>
            <input type="text" name="ofertas_especiais" id="ofertas_especiais" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="ofertas_terceiro_domingo">Ofertas Terceiro Domingo:</label>
            <input type="text" name="ofertas_terceiro_domingo" id="ofertas_terceiro_domingo" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="doacoes">Doações:</label>
            <input type="text" name="doacoes" id="doacoes" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-8">
          <div class="form-group">
            <label for="valor_total_entrada">Valor Total Entrada:</label>
            <input type="text" name="valor_total_entrada" id="valor_total_entrada" class="form-control" readonly>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="taxa_da_regiao">Taxa 4% da Região:</label>
            <input type="text" name="taxa_da_regiao" id="taxa_da_regiao" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="taxa_cnd">Taxa 4% CND:</label>
            <input type="text" name="taxa_cnd" id="taxa_cnd" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="taxa_fundo_social_cnd">Taxa 1% Fundo Social CND:</label>
            <input type="text" name="taxa_fundo_social_cnd" id="taxa_fundo_social_cnd" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="taxa_oferta_missoes_cnd">Taxa Oferta Missões CND:</label>
            <input type="text" name="taxa_oferta_missoes_cnd" id="taxa_oferta_missoes_cnd" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="taxa_fire">Taxa 3% FIRE:</label>
            <input type="text" name="taxa_fire" id="taxa_fire" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="taxa_ced">Taxa 4% CED:</label>
            <input type="text" name="taxa_ced" id="taxa_ced" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="taxa_oferta_missoes_ced">Taxa Oferta Missões CED:</label>
            <input type="text" name="taxa_oferta_missoes_ced" id="taxa_oferta_missoes_ced" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="honorarios">Honorários:</label>
            <input type="text" name="honorarios" id="honorarios" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="agua">Água:</label>
            <input type="text" name="agua" id="agua" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="energia_eletrica">Energia Elétrica:</label>
            <input type="text" name="energia_eletrica" id="energia_eletrica" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="aluguel">Aluguel:</label>
            <input type="text" name="aluguel" id="aluguel" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="despesas_de_viagens">Despesas de Viagens:</label>
            <input type="text" name="despesas_de_viagens" id="despesas_de_viagens" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="despesas_de_mercado">Despesas de Mercado:</label>
            <input type="text" name="despesas_de_mercado" id="despesas_de_mercado" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="internet">Internet:</label>
            <input type="text" name="internet" id="internet" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="sustento_pastoral">Sustento Pastoral:</label>
            <input type="text" name="sustento_pastoral" id="sustento_pastoral" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="despesas_bancarias">Despesas Bancárias:</label>
            <input type="text" name="despesas_bancarias" id="despesas_bancarias" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="materiais_eletricos">Materiais Elétricos:</label>
            <input type="text" name="materiais_eletricos" id="materiais_eletricos" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="materiais_construcao">Materiais de Construção:</label>
            <input type="text" name="materiais_construcao" id="materiais_construcao" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="reforma">Reforma:</label>
            <input type="text" name="reforma" id="reforma" class="form-control">
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="doacoes_saidas">Doações Saídas:</label>
            <input type="text" name="doacoes_saidas" id="doacoes_saidas" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-8">
          <div class="form-group">
            <label for="soma_saidas">Soma Saídas:</label>
            <input type="text" name="soma_saidas" id="soma_saidas" class="form-control" readonly>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-8">
          <label for="saldo_final" class="mr-2">Saldo Final:</label>
          <div class="form-group d-flex align-items-center">
            <input type="text" name="saldo_final" id="saldo_final" class="form-control mr-2" readonly>
            <input type="button" id="calcular_button" class="btn btn-success text-white" value="Calcular">
          </div>
        </div>
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
  </div>

  <script src="./js/calcule.js"></script>
</body>
</html>
