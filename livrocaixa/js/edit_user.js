$(document).ready(function() {
  $("#editForm").on("submit", function(event) {
    event.preventDefault();
    
    var $form = $(this),
      user_id = $form.find("input[name='user_id']").val(),
      email = $form.find("input[name='email']").val(),
      password = $form.find("input[name='password']").val(),
      password_confirmation = $form.find("input[name='password_confirmation']").val(),
      url = $form.attr("action");

    $.post(url, { user_id: user_id, email: email, password: password, password_confirmation: password_confirmation })
      .done(function(data) {
        if (data === "email_branco") {
          Swal.fire({
            title: 'Erro!',
            text: 'E-mail em branco',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
        } else if(data === "senha_branco") {
          Swal.fire({
            title: 'Erro!',
            text: 'Senha em branco',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
        } else if(data === "senha_diferente") {
          Swal.fire({
            title: 'Erro!',
            text: 'As senhas não conferem',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
        } else if(data === "email_igual") {
          Swal.fire({
            title: 'Erro!',
            text: 'E-mail já cadastrado',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
        } else if(data === "error") {
          Swal.fire({
            title: 'Erro!',
            text: 'Ocorreu um erro no banco de dados',
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
