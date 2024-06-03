<?php
    session_start();
    
    
    //montagem do texto
    $texto = Array(
    $_SESSION['id'],
    $_POST['titulo'],
    $_POST['categoria'],
    $_POST['descricao']
    ) ;
    $txt = implode(" # ", $texto) . PHP_EOL;
    
    
    //abrindo arquivo
    $arquivo = fopen("arquivo.txt","a");
    //Escrevendo texto no arquivo
    fwrite($arquivo, $txt);
    //Fechando o arquivo
    fclose($arquivo);

    header("Location: AbrirChamado.php");
?>