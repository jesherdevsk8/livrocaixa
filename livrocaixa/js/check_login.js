$(document).ready(function() {
  $("#loginForm").on("submit", function(event) {
    event.preventDefault();
    
    var $form = $(this),
      email = $form.find("input[name='email']").val(),
      password = $form.find("input[name='password']").val(),
      url = $form.attr("action");

    $.post(url, { email: email, password: password })
      .done(function(data) {
        if (data === "error") {
          Swal.fire({
            title: 'Erro!',
            text: 'Login ou Senha incorretos',
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
            window.location = 'livrocaixa/admin.php';
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
