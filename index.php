<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>App Help Desk</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="icon" href="assets/formulario_abrir_chamado.png">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="assets/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      App Help Desk
    </a>
  </nav>
  <div class="container">    
    <div class="row justify-content-center mt-5 ">
      <div class="card w-50 rounded-bottom-0">
        <div class="card-header">
          Login
        </div>
        <div class="card-body">
          <form method="post" action="validaLogin.php">
            <div class="form-group">
              <input name="email" type="email" class="form-control" placeholder="E-mail">
            </div>
            <div class="form-group">
              <input name="password" type="password" class="form-control" placeholder="Senha">
            </div>
            <?php if(isset($_GET['login']) && $_GET['login'] == 'erro'){ ?>
              <div class="text-danger">
                Usuário ou senha inválido(s)
              </div>
            <?php } ?>
            <?php if(isset($_GET['login']) && $_GET['login'] == 'erro2'){ ?>
              <div class="text-danger">
                Faça login antes de acessar as páginas protegidas
              </div>
            <?php } ?>
            <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
          </form>
        </div>
      </div>
    </div>
    <div class="row justify-content-center emails" id="emails">
      <div class="card w-50 rounded-top-0 bg-dark text-white" id="formatacaotopo">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div>
            <div>Accepted emails</div>
            <div class="mt-2">
              - adm@gmail.com<br>
              - user@gmail.com<br>
              - paulo@gmail.com
            </div>
          </div>
          <div>
            All pass: "12345"
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
