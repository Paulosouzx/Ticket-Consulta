<?php
session_start();

//variavel que verifica se a autenticacao foi realizada
$userAutenticado = false;
$userId = null;
$userPerfil_id = null;

$perfis = [
    1 => "Administrativo", 2 => "Usuario"
];

//usuarios do sistema
$userApp = [

    ['id' => 1, 'email' => 'adm@gmail.com','password' => '12345', 'perfil_id' => 1],
    ['id' => 2, 'email' => 'user@gmail.com', 'password' => '12345', 'perfil_id' => 2],
    ['id' => 3, 'email' => 'paulo@gmail.com', 'password' => '12345', 'perfil_id' => 2],
    ['id' => 4, 'email' => 'sara@gmail.com', 'password' => '12345', 'perfil_id' => 2],

];

foreach($userApp as $user) {
    if($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']) {
        $userAutenticado = true;
        $userId = $user['id'];
        $userPerfil_id = $user['perfil_id'];
    }
}

    if($userAutenticado) {
        echo 'autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $userId;
        $_SESSION['perfil_id'] = $userPerfil_id;
        header('Location: home.php');
    } else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');

    }



?>