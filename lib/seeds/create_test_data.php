<?php
include("../../config/connection.php");

date_default_timezone_set('America/Sao_Paulo');

// Número de registros a serem inseridos
$numberOfRecords = isset($_GET['num']) ? intval($_GET['num']) : 10;
// http://localhost:8080/lib/seeds/create_test_data.php?num=40

// Função para gerar valores aleatórios
function randomValue() {
    return number_format(rand(1000, 5000) / 100, 2, '.', '');
}

// Inserir registros
for ($i = 0; $i < $numberOfRecords; $i++) {
    $fields = [
        'saldo_mes_anterior' => randomValue(),
        'dizimos' => randomValue(),
        'ofertas_gerais' => randomValue(),
        'ofertas_especiais' => randomValue(),
        'ofertas_terceiro_domingo' => randomValue(),
        'doacoes' => randomValue(),
        'valor_total_entrada' => randomValue(),
        'taxa_da_regiao' => randomValue(),
        'taxa_cnd' => randomValue(),
        'taxa_oferta_missoes_cnd' => randomValue(),
        'taxa_fundo_social_cnd' => randomValue(),
        'taxa_fire' => randomValue(),
        'taxa_ced' => randomValue(),
        'taxa_oferta_missoes_ced' => randomValue(),
        'honorarios' => randomValue(),
        'agua' => randomValue(),
        'energia_eletrica' => randomValue(),
        'aluguel' => randomValue(),
        'despesas_de_viagens' => randomValue(),
        'despesas_de_mercado' => randomValue(),
        'internet' => randomValue(),
        'sustento_pastoral' => randomValue(),
        'despesas_bancarias' => randomValue(),
        'materiais_eletricos' => randomValue(),
        'materiais_construcao' => randomValue(),
        'reforma' => randomValue(),
        'doacoes_saidas' => randomValue(),
        'soma_saidas' => randomValue(),
        'saldo_final' => randomValue()
    ];

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
                `despesas_de_viagens`,
                `despesas_de_mercado`,
                `internet`,
                `sustento_pastoral`,
                `despesas_bancarias`,
                `materiais_eletricos`,
                `materiais_construcao`,
                `reforma`,
                `doacoes_saidas`,
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
                :saldo_final,
                :created_at
            )";

    try {
        $statement = $PDO->prepare($sql);
        $result = $statement->execute(array_merge($fields, [
            ':created_at' => date('Y-m-d H:i:s')
        ]));
    } catch (PDOException $e) {
        echo "Erro ao inserir dados: " . $e->getMessage();
    }
}

echo "$numberOfRecords registros inseridos com sucesso!";
?>
