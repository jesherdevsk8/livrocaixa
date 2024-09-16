$(document).ready(function() {
  $("#formProcess").on("submit", function(event) {
    event.preventDefault();

    var $form = $(this),
      user_id = $form.find("input[name='user_id']").val(),
      saldo_mes_anterior = $form.find("input[name='saldo_mes_anterior']").val(),
      dizimos = $form.find("input[name='dizimos']").val(),
      ofertas_gerais = $form.find("input[name='ofertas_gerais']").val(),
      ofertas_especiais = $form.find("input[name='ofertas_especiais']").val(),
      ofertas_terceiro_domingo = $form.find("input[name='ofertas_terceiro_domingo']").val(),
      doacoes = $form.find("input[name='doacoes']").val(),
      valor_total_entrada = $form.find("input[name='valor_total_entrada']").val(),
      taxa_da_regiao = $form.find("input[name='taxa_da_regiao']").val(),
      taxa_cnd = $form.find("input[name='taxa_cnd']").val(),
      taxa_oferta_missoes_cnd = $form.find("input[name='taxa_oferta_missoes_cnd']").val(),
      taxa_fundo_social_cnd = $form.find("input[name='taxa_fundo_social_cnd']").val(),
      taxa_fire = $form.find("input[name='taxa_fire']").val(),
      taxa_ced = $form.find("input[name='taxa_ced']").val(),
      taxa_oferta_missoes_ced = $form.find("input[name='taxa_oferta_missoes_ced']").val(),
      honorarios = $form.find("input[name='honorarios']").val(),
      agua = $form.find("input[name='agua']").val(),
      energia_eletrica = $form.find("input[name='energia_eletrica']").val(),
      aluguel = $form.find("input[name='aluguel']").val(),
      despesas_de_viagens = $form.find("input[name='despesas_de_viagens']").val(),
      despesas_de_mercado = $form.find("input[name='despesas_de_mercado']").val(),
      internet = $form.find("input[name='internet']").val(),
      sustento_pastoral = $form.find("input[name='sustento_pastoral']").val(),
      despesas_bancarias = $form.find("input[name='despesas_bancarias']").val(),
      materiais_eletricos = $form.find("input[name='materiais_eletricos']").val(),
      materiais_construcao = $form.find("input[name='materiais_construcao']").val(),
      reforma = $form.find("input[name='reforma']").val(),
      doacoes_saidas = $form.find("input[name='doacoes_saidas']").val(),
      soma_saidas = $form.find("input[name='soma_saidas']").val(),
      saldo_final = $form.find("input[name='saldo_final']").val(),
      mes_referencia = $form.find("select[name='mes_referencia']").val()
      url = $form.attr("action");

      data = {
        user_id: user_id,
        saldo_mes_anterior: saldo_mes_anterior,
        dizimos: dizimos,
        ofertas_gerais: ofertas_gerais,
        ofertas_especiais: ofertas_especiais,
        ofertas_terceiro_domingo: ofertas_terceiro_domingo,
        doacoes: doacoes,
        valor_total_entrada: valor_total_entrada,
        taxa_da_regiao: taxa_da_regiao,
        taxa_cnd: taxa_cnd,
        taxa_oferta_missoes_cnd: taxa_oferta_missoes_cnd,
        taxa_fundo_social_cnd: taxa_fundo_social_cnd,
        taxa_fire: taxa_fire,
        taxa_ced: taxa_ced,
        taxa_oferta_missoes_ced: taxa_oferta_missoes_ced,
        honorarios: honorarios,
        agua: agua,
        energia_eletrica: energia_eletrica,
        aluguel: aluguel,
        despesas_de_viagens: despesas_de_viagens,
        despesas_de_mercado: despesas_de_mercado,
        internet: internet,
        sustento_pastoral: sustento_pastoral,
        despesas_bancarias: despesas_bancarias,
        materiais_eletricos: materiais_eletricos,
        materiais_construcao: materiais_construcao,
        reforma: reforma,
        doacoes_saidas: doacoes_saidas,
        soma_saidas: soma_saidas,
        saldo_final: saldo_final,
        mes_referencia: mes_referencia
      }

    if (!valor_total_entrada || valor_total_entrada === "0" || parseFloat(valor_total_entrada) <= 0) {
      Swal.fire({
        title: 'Erro!',
        text: 'O campo "Valor Total Entrada" deve ser preenchido com um valor maior que 0.',
        icon: 'error',
        confirmButtonText: 'Ok'
      });
      return;
    } else if (!soma_saidas || soma_saidas === "0" || parseFloat(soma_saidas) <= 0) {
      Swal.fire({
        title: 'Erro!',
        text: 'O campo "Soma Saídas" deve ser preenchido com um valor maior que 0.',
        icon: 'error',
        confirmButtonText: 'Ok'
      });
      return;
    } else if (!saldo_final) {
      Swal.fire({
        title: 'Erro!',
        text: 'O campo "Saldo Final" deve ser preenchido com um valor maior que 0.',
        icon: 'error',
        confirmButtonText: 'Ok'
      });
      return;
    } else 

    $.post(url, data)
      .done(function(data) {
        if (data === "error_sql") {
          Swal.fire({
            title: 'Erro!',
            text: 'Ocorreu um erro ao inserir os dados.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
        } else if(data === "error") {
          Swal.fire({
            title: 'Erro!',
            text: 'Erro ao inserir dados. Verifique os logs para mais detalhes.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
        } else if (data === "ok") {
          Swal.fire({
            title: 'Sucesso!',
            text: 'Login efetuado com sucesso. Aguarde...',
            icon: 'success',
            showConfirmButton: false
          });

          setTimeout(function() {
            window.location = 'admin.php';
          }, 2000);
        } else {
          Swal.fire({
            title: 'Erro!',
            text: 'Resposta inesperada do servidor.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
        }
      });
  });
});
