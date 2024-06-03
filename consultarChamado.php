<?php require_once('validadorAcesso.php');?>

<?php 
  $chamados = array();
//abrir arquivo.hd
  $arquivo = fopen("arquivo.txt","r");

  //enquanto houver registros (linhas) a serem recuperadas
  //testa pelo fim do arquivo
  while(!feof($arquivo)){

    $registro = fgets($arquivo);//recupera a linha

    $registroDetalhes = explode("#", $registro);
    
    //(perfil id = 2) só vamos exibir o chamado, se ele foi criado pelo usuário
    if($_SESSION['perfil_id'] == 2){
      //se usuário autenticado não for o usuário de abertura do chamado então não faz nada
      if($_SESSION['id'] != $registro_detalhes[0]) {
        continue; //não faz nada

      } else {
        $chamados[] = $registro; //adiciona o registro do arquivo ao array $chamados
      }

    } else {
      $chamados[] = $registro; //adiciona o registro do arquivo ao array $chamados
    }
  }
  //fecha o arquivo aberto
  fclose($arquivo);
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="icon" href="assets/formulario_abrir_chamado.png">
    <link rel="stylesheet" href="style.css">

    
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="assets/logo.png"30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

            <?php foreach($chamados as $chamado){ ?>

              <?php
                $chamadoDados = explode('#', $chamado);

                if($_SESSION['perfil_id'] == 2){
                  //apenas exibir se foi criado pelo mesmo usuario
                  if($_SESSION['id'] != $chamadoDados[0]){
                    continue;
                  }
                }

                if(count($chamadoDados) < 3){
                  continue;
                }
              ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $chamadoDados[1]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamadoDados[2]?></h6>
                  <p class="card-text"><?= $chamadoDados[3]?></p>

                </div>
              </div>

              <?php } ?>
              </div>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>