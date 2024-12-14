function applyMask(input) {
  let v = input.value.replace(/\D/g, '');
  if (v.length === 0) {
    input.value = '';
    return;
  }
  v = (v / 100).toFixed(2);
  v = v.replace('.', ',');
  v = v.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
  input.value = v;
}

function formatCurrency(input) {
  applyMask(input);
}

function formatCurrency(input) {
  var v = input.value.toString().replace(/\D/g, '');
  v = (v / 100).toFixed(2) + '';
  v = v.replace(".", ",");
  v = v.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
  input.value = v;
}

function formatToCalc(value) {
  if (value) {
    var v = value.toString().replace(/\D/g, '');
    v = (v / 100).toFixed(2) + '';
    v = v.replace(",", ".");
    return v;
  }
}

function calcularTotalEntrada() {
  const saldoMesAnterior = parseFloat(formatToCalc(document.getElementById('saldo_mes_anterior').value)) || 0.0;
  const dizimos = parseFloat(formatToCalc(document.getElementById('dizimos').value)) || 0.0;
  const ofertasGerais = parseFloat(formatToCalc(document.getElementById('ofertas_gerais').value)) || 0.0;
  const ofertasEspeciais = parseFloat(formatToCalc(document.getElementById('ofertas_especiais').value)) || 0.0;
  const ofertasTerceiroDomingo = parseFloat(formatToCalc(document.getElementById('ofertas_terceiro_domingo').value)) || 0.0;
  const doacoes = parseFloat(formatToCalc(document.getElementById('doacoes').value)) || 0.0;
  
  const valorTotalEntrada = saldoMesAnterior + dizimos + ofertasGerais + ofertasEspeciais + ofertasTerceiroDomingo + doacoes;
  
  document.getElementById('valor_total_entrada').value = valorTotalEntrada.toFixed(2).toString().replace(".", ",");
}

document.addEventListener('DOMContentLoaded', function() {
  const campos = document.querySelectorAll('#saldo_mes_anterior, #dizimos, #ofertas_gerais, #ofertas_especiais, #ofertas_terceiro_domingo, #doacoes');
  campos.forEach(function(campo) {
      campo.addEventListener('input', calcularTotalEntrada);
  });
});

function calcularTotalSaidas() {
  const taxaDaRegiao = parseFloat(formatToCalc(document.getElementById('taxa_da_regiao').value)) || 0.0;
  const taxaCND = parseFloat(formatToCalc(document.getElementById('taxa_cnd').value)) || 0.0;
  const taxaFundoSocialCND = parseFloat(formatToCalc(document.getElementById('taxa_fundo_social_cnd').value)) || 0.0;
  const taxaOfertaMissoesCND = parseFloat(formatToCalc(document.getElementById('taxa_oferta_missoes_cnd').value)) || 0.0;
  const taxaFire = parseFloat(formatToCalc(document.getElementById('taxa_fire').value)) || 0.0;
  const taxaCED = parseFloat(formatToCalc(document.getElementById('taxa_ced').value)) || 0.0;
  const taxaOfertaMissoesCED = parseFloat(formatToCalc(document.getElementById('taxa_oferta_missoes_ced').value)) || 0.0;
  const honorarios = parseFloat(formatToCalc(document.getElementById('honorarios').value)) || 0.0;
  const agua = parseFloat(formatToCalc(document.getElementById('agua').value)) || 0.0;
  const energiaEletrica = parseFloat(formatToCalc(document.getElementById('energia_eletrica').value)) || 0.0;
  const aluguel = parseFloat(formatToCalc(document.getElementById('aluguel').value)) || 0.0;
  const despesasDeViagens = parseFloat(formatToCalc(document.getElementById('despesas_de_viagens').value)) || 0.0;
  const despesasDeMercado = parseFloat(formatToCalc(document.getElementById('despesas_de_mercado').value)) || 0.0;
  const internet = parseFloat(formatToCalc(document.getElementById('internet').value)) || 0.0;
  const sustentoPastoral = parseFloat(formatToCalc(document.getElementById('sustento_pastoral').value)) || 0.0;
  const despesasBancarias = parseFloat(formatToCalc(document.getElementById('despesas_bancarias').value)) || 0.0;
  const materiaisEletricos = parseFloat(formatToCalc(document.getElementById('materiais_eletricos').value)) || 0.0;
  const materiaisConstrucao = parseFloat(formatToCalc(document.getElementById('materiais_construcao').value)) || 0.0;
  const reforma = parseFloat(formatToCalc(document.getElementById('reforma').value)) || 0.0;
  const doacoesSaidas = parseFloat(formatToCalc(document.getElementById('doacoes_saidas').value)) || 0.0;

  const valorTotalSaidas = taxaDaRegiao + taxaCND + taxaFundoSocialCND + taxaOfertaMissoesCND + taxaFire +
                            taxaCED + taxaOfertaMissoesCED + honorarios + agua + energiaEletrica + 
                            aluguel + despesasDeViagens + despesasDeMercado + internet + sustentoPastoral + 
                            despesasBancarias + materiaisEletricos + materiaisConstrucao + reforma + doacoesSaidas;

  document.getElementById('soma_saidas').value = valorTotalSaidas.toFixed(2).toString().replace(".", ",");
}


document.addEventListener('DOMContentLoaded', function() {
  const campos = document.querySelectorAll(
    '#taxa_da_regiao, #taxa_cnd, #taxa_fundo_social_cnd, #taxa_oferta_missoes_cnd, #taxa_fire, #taxa_ced, #taxa_oferta_missoes_ced, ' +
    '#honorarios, #agua, #energia_eletrica, #aluguel, #despesas_de_viagens, #despesas_de_mercado, #internet, #sustento_pastoral, #despesas_bancarias, ' +
    '#materiais_eletricos, #materiais_construcao, #reforma, #doacoes_saidas'
  );
  
  campos.forEach(function(campo) {
      campo.addEventListener('input', calcularTotalSaidas);
  });
});


function calcularTotalFinal() {
  const valorTotalEntrada = parseFloat(formatToCalc(document.getElementById('valor_total_entrada').value)) || 0.0;
  const somaSaidas = parseFloat(formatToCalc(document.getElementById('soma_saidas').value)) || 0.0;

  const saldo = valorTotalEntrada - somaSaidas;
  document.getElementById('saldo_final').value = saldo.toFixed(2).toString().replace(".", ",");
}

document.addEventListener('DOMContentLoaded', function() {
  const botaoCalcular = document.getElementById('calcular_button');
  botaoCalcular.addEventListener('click', calcularTotalFinal);
});
