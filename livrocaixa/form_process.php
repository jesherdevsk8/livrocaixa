<?php
  include("../config/conexao.php");

  extract($_POST);

  date_default_timezone_set('America/Sao_Paulo');

  $fields = [
    'saldo_mes_anterior' => $saldo_mes_anterior,
    'dizimos' => $dizimos,
    'ofertas_gerais' => $ofertas_gerais,
    'ofertas_especiais' => $ofertas_especiais,
    'ofertas_terceiro_domingo' => $ofertas_terceiro_domingo,
    'doacoes' => $doacoes,
    'valor_total_entrada' => $valor_total_entrada,
    'taxa_da_regiao' => $taxa_da_regiao,
    'taxa_cnd' => $taxa_cnd,
    'taxa_oferta_missoes_cnd' => $taxa_oferta_missoes_cnd,
    'taxa_fundo_social_cnd' => $taxa_fundo_social_cnd,
    'taxa_fire' => $taxa_fire,
    'taxa_ced' => $taxa_ced,
    'taxa_oferta_missoes_ced' => $taxa_oferta_missoes_ced,
    'honorarios' => $honorarios,
    'agua' => $agua,
    'energia_eletrica' => $energia_eletrica,
    'aluguel' => $aluguel,
    'despesas_de_mercado' => $despesas_de_mercado,
    'internet' => $internet,
    'sustento_pastoral' => $sustento_pastoral,
    'despesas_bancarias' => $despesas_bancarias,
    'outras_saidas' => $outras_saidas,
    'soma_saidas' => $soma_saidas,
    'saldo_final' => $saldo_final
  ];

  foreach ($fields as $key => $value) {
    if (empty($value)) {
      $fields[$key] = '0.00';
    }
  }

  $sql = "INSERT INTO `planilha_mensal` (
            `saldo_mes_anterior`,
            `dizimos`,
            `ofertas_gerais`,
            `ofertas_especiais`,
            `ofertas_terceiro_domingo`,
            `doacoes`,
            `valor_total_entrada`,
            `taxa_da_regiao`,
            `taxa_cnd`,
            `taxa_oferta_missoes_cnd`,
            `taxa_fundo_social_cnd`,
            `taxa_fire`,
            `taxa_ced`,
            `taxa_oferta_missoes_ced`,
            `honorarios`,
            `agua`,
            `energia_eletrica`,
            `aluguel`,
            `despesas_de_mercado`,
            `internet`,
            `sustento_pastoral`,
            `despesas_bancarias`,
            `outras_saidas`,
            `soma_saidas`,
            `saldo_final`,
            `created_at`
          ) VALUES (
            :saldo_mes_anterior,
            :dizimos,
            :ofertas_gerais,
            :ofertas_especiais,
            :ofertas_terceiro_domingo,
            :doacoes,
            :valor_total_entrada,
            :taxa_da_regiao,
            :taxa_cnd,
            :taxa_oferta_missoes_cnd,
            :taxa_fundo_social_cnd,
            :taxa_fire,
            :taxa_ced,
            :taxa_oferta_missoes_ced,
            :honorarios,
            :agua,
            :energia_eletrica,
            :aluguel,
            :despesas_de_mercado,
            :internet,
            :sustento_pastoral,
            :despesas_bancarias,
            :outras_saidas,
            :soma_saidas,
            :saldo_final,
            :created_at
          )";

  try {
    $statement = $PDO->prepare($sql);
    $result = $statement->execute(array_merge($fields, [
      ':created_at' => date('Y-m-d H:i:s')
    ]));

    if ($result) {
      header("Location: ../index.php");
      exit();
    } else {
      print_r($statement->errorInfo());
    }
  } catch(PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
  }
?>
