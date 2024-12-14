<?php
  include("../config/connection.php");

  extract($_POST);

  date_default_timezone_set('America/Sao_Paulo');

  $fields = [];
  foreach ($_POST as $key => $value) {
    $fields[$key] = !empty($value) ? str_replace(['.', ','], ['', '.'], $value) : '0.00';
  }

  $sql = "INSERT INTO planilha_mensal (
              saldo_mes_anterior,
              dizimos,
              ofertas_gerais,
              ofertas_especiais,
              ofertas_terceiro_domingo,
              doacoes,
              valor_total_entrada,
              taxa_da_regiao,
              taxa_cnd,
              taxa_oferta_missoes_cnd,
              taxa_fundo_social_cnd,
              taxa_fire,
              taxa_ced,
              taxa_oferta_missoes_ced,
              honorarios,
              agua,
              energia_eletrica,
              aluguel,
              despesas_de_viagens,
              despesas_de_mercado,
              internet,
              sustento_pastoral,
              despesas_bancarias,
              materiais_eletricos,
              materiais_construcao,
              reforma,
              doacoes_saidas,
              soma_saidas,
              mes_referencia,
              saldo_final,
              usuario_id,
              created_at
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
              :despesas_de_viagens,
              :despesas_de_mercado,
              :internet,
              :sustento_pastoral,
              :despesas_bancarias,
              :materiais_eletricos,
              :materiais_construcao,
              :reforma,
              :doacoes_saidas,
              :soma_saidas,
              :mes_referencia,
              :saldo_final,
              :user_id,
              :created_at
          )";

  try {
    $statement = $PDO->prepare($sql);
    $result = $statement->execute(array_merge($fields, [
      ':created_at' => date('Y-m-d H:i:s'),
      ':user_id' => $user_id,
    ]));

    if ($result) {
      echo "ok";
    } else {
      print_r($statement->errorInfo());
      echo "error_sql";
    }
  } catch (PDOException $e) {
    print_r($statement->errorInfo());
    echo "error";
  }
?>
