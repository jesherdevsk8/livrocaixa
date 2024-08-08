--
-- Table structure for table `livrocaixa`
--

DROP DATABASE IF EXISTS `livrocaixa`;
CREATE DATABASE IF NOT EXISTS `livrocaixa`;

USE `livrocaixa`;

DROP TABLE IF EXISTS `planilha_mensal`;
CREATE TABLE IF NOT EXISTS `planilha_mensal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `saldo_mes_anterior` DECIMAL(10, 2),
  `dizimos` DECIMAL(10, 2),
  `ofertas_gerais` DECIMAL(10, 2),
  `ofertas_especiais` DECIMAL(10, 2),
  `ofertas_terceiro_domingo` DECIMAL(10, 2),
  `doacoes` DECIMAL(10, 2),
  `valor_total_entrada` DECIMAL(10, 2),
  `taxa_da_regiao` DECIMAL(10, 2),
  `taxa_cnd` DECIMAL(10, 2),
  `taxa_fundo_social_cnd` DECIMAL(10, 2),
  `taxa_oferta_missoes_cnd` DECIMAL(10, 2),
  `taxa_fire` DECIMAL(10, 2),
  `taxa_ced` DECIMAL(10, 2),
  `taxa_oferta_missoes_ced` DECIMAL(10, 2),
  `honorarios` DECIMAL(10, 2),
  `agua` DECIMAL(10, 2),
  `energia_eletrica` DECIMAL(10, 2),
  `aluguel` DECIMAL(10, 2),
  `despesas_de_mercado` DECIMAL(10, 2),
  `internet` DECIMAL(10, 2),
  `sustento_pastoral` DECIMAL(10, 2),
  `despesas_bancarias` DECIMAL(10, 2),
  `outras_saidas` DECIMAL(10, 2),
  `soma_saidas` DECIMAL(10, 2),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
