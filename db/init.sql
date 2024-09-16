-- Tabela `usuarios`
DROP TABLE IF EXISTS usuarios;
CREATE TABLE IF NOT EXISTS usuarios (
  id SERIAL PRIMARY KEY,
  email VARCHAR(255) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  credencial VARCHAR(50) NOT NULL UNIQUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela `planilha_mensal`
DROP TABLE IF EXISTS planilha_mensal;
CREATE TABLE IF NOT EXISTS planilha_mensal (
  id SERIAL PRIMARY KEY,
  saldo_mes_anterior DECIMAL(10, 2),
  dizimos DECIMAL(10, 2),
  ofertas_gerais DECIMAL(10, 2),
  ofertas_especiais DECIMAL(10, 2),
  ofertas_terceiro_domingo DECIMAL(10, 2),
  doacoes DECIMAL(10, 2),
  valor_total_entrada DECIMAL(10, 2),
  taxa_da_regiao DECIMAL(10, 2),
  taxa_cnd DECIMAL(10, 2),
  taxa_fundo_social_cnd DECIMAL(10, 2),
  taxa_oferta_missoes_cnd DECIMAL(10, 2),
  taxa_fire DECIMAL(10, 2),
  taxa_ced DECIMAL(10, 2),
  taxa_oferta_missoes_ced DECIMAL(10, 2),
  honorarios DECIMAL(10, 2),
  agua DECIMAL(10, 2),
  energia_eletrica DECIMAL(10, 2),
  aluguel DECIMAL(10, 2),
  despesas_de_viagens DECIMAL(10, 2),
  despesas_de_mercado DECIMAL(10, 2),
  internet DECIMAL(10, 2),
  sustento_pastoral DECIMAL(10, 2),
  despesas_bancarias DECIMAL(10, 2),
  materiais_eletricos DECIMAL(10, 2),
  materiais_construcao DECIMAL(10, 2),
  reforma DECIMAL(10, 2),
  doacoes_saidas DECIMAL(10, 2),
  soma_saidas DECIMAL(10, 2),
  saldo_final DECIMAL(10, 2),
  mes_referencia VARCHAR(50) NOT NULL,
  usuario_id INTEGER NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);
