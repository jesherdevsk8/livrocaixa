function calcularTotalEntrada() {
  const saldoMesAnterior = parseFloat(document.getElementById('saldo_mes_anterior').value) || 0.0;
  const dizimos = parseFloat(document.getElementById('dizimos').value) || 0.0;
  const ofertasGerais = parseFloat(document.getElementById('ofertas_gerais').value) || 0.0;
  const ofertasEspeciais = parseFloat(document.getElementById('ofertas_especiais').value) || 0.0;
  const ofertasTerceiroDomingo = parseFloat(document.getElementById('ofertas_terceiro_domingo').value) || 0.0;
  const doacoes = parseFloat(document.getElementById('doacoes').value) || 0.0;
  
  const valorTotalEntrada = saldoMesAnterior + dizimos + ofertasGerais + ofertasEspeciais + ofertasTerceiroDomingo + doacoes;
  
  document.getElementById('valor_total_entrada').value = valorTotalEntrada.toFixed(2);
}

document.addEventListener('DOMContentLoaded', function() {
  const campos = document.querySelectorAll('#saldo_mes_anterior, #dizimos, #ofertas_gerais, #ofertas_especiais, #ofertas_terceiro_domingo, #doacoes');
  campos.forEach(function(campo) {
      campo.addEventListener('input', calcularTotalEntrada);
  });
});

function calcularTotalSaidas() {
  const taxaDaRegiao = parseFloat(document.getElementById('taxa_da_regiao').value) || 0.0;
  const taxaCND = parseFloat(document.getElementById('taxa_cnd').value) || 0.0;
  const taxaFundoSocialCND = parseFloat(document.getElementById('taxa_fundo_social_cnd').value) || 0.0;
  const taxaOfertaMissoesCND = parseFloat(document.getElementById('taxa_oferta_missoes_cnd').value) || 0.0;
  const taxaFire = parseFloat(document.getElementById('taxa_fire').value) || 0.0;
  const taxaCED = parseFloat(document.getElementById('taxa_ced').value) || 0.0;

  const taxaOfertaMissoesCED = parseFloat(document.getElementById('taxa_oferta_missoes_ced').value) || 0.0;
  const honorarios = parseFloat(document.getElementById('honorarios').value) || 0.0;
  const agua = parseFloat(document.getElementById('agua').value) || 0.0;
  const energiaEletrica = parseFloat(document.getElementById('energia_eletrica').value) || 0.0;
  const aluguel = parseFloat(document.getElementById('aluguel').value) || 0.0;
  const despesasDeMercado = parseFloat(document.getElementById('despesas_de_mercado').value) || 0.0;
  const internet = parseFloat(document.getElementById('internet').value) || 0.0;
  const sustentoPastoral = parseFloat(document.getElementById('sustento_pastoral').value) || 0.0;
  const despesasBancarias = parseFloat(document.getElementById('despesas_bancarias').value) || 0.0;
  const outrasSaidas = parseFloat(document.getElementById('outras_saidas').value) || 0.0;

  const valorTotalSaidas = taxaDaRegiao + taxaCND + taxaFundoSocialCND + taxaOfertaMissoesCND + taxaFire +
                            taxaCED + taxaOfertaMissoesCED + honorarios + agua + energiaEletrica + 
                            aluguel + despesasDeMercado + internet + sustentoPastoral + despesasBancarias + outrasSaidas;

  document.getElementById('soma_saidas').value = valorTotalSaidas.toFixed(2);
}

document.addEventListener('DOMContentLoaded', function() {
  const campos = document.querySelectorAll(
    '#taxa_da_regiao, #taxa_cnd, #taxa_fundo_social_cnd, #taxa_oferta_missoes_cnd, #taxa_fire, #taxa_ced, #taxa_oferta_missoes_ced, ' +
    '#honorarios, #agua, #energia_eletrica, #aluguel, #despesas_de_mercado, #internet, #sustento_pastoral, #despesas_bancarias, #outras_saidas'
  );
  
  campos.forEach(function(campo) {
      campo.addEventListener('input', calcularTotalSaidas);
  });
});


