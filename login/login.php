<?php

require_once "index.php";

//conn banco
require_once "../conexaodb.php";

//sessão
session_start();

//login

$erros = array();

$login = mysqli_escape_string($conn, $_POST['Codlogin']);
$senha = mysqli_escape_string($conn, $_POST['senhaLogin']);

if(empty($login) or empty($senha)){
    $erros[] = "<h1> COLOQUE O LOGIN E/OU A SENHA <h1>";
}

if(!empty($login) and !empty($senha)){

    $sql = "SELECT login, senha, nome FROM login WHERE login = '$login' AND senha = '$senha' ";
    $result1 = mysqli_query($conn, $sql);
    
    if(mysqli_query($conn, $sql)){

        if(mysqli_num_rows($result1) > 0){
            
            $sql = "SELECT * FROM login WHERE cod_usuario = '$login' AND sen_usuario = '$senha' ";
            $result2 = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result2) == 1){
                
                $userData = mysqli_fetch_array($result2);
                $_SESSION['logado'] = true;
                $_SESSION["login"] = $userData['login'];
                $_SESSION["nome"] = $userData['nome'];
                header('Location: ../index.php');

            }else{
                echo "Erro multiplas contas detectadas, entre em contato como suporte";
            }

        }else{
            echo "Usuário ou senha inválidos!";
        }

    }else {

        echo "Error: " . mysqli_error($conn);

    }
    
}

if(!empty($erros)){
    foreach($erros as $erros):
        echo $erros;
    endforeach;
}


mysqli_close($conn);

?>