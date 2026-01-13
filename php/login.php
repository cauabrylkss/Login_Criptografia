<?php

    $email = $_POST["email"];
    $senha = $_POST["senha"];
    // conecta os valores do formulario (vindo do fetch -> FormData)
    $con = mysqli_connect("localhost:3306", "root", "*senha*", "*bancodados*");
    $stmt = mysqli_stmt_init($con); //basicamente cria espaco na memoria pros comandos
    $query = "select * from usuario where email = ? and senha = ?";
    mysqli_stmt_prepare($stmt, $query); //prepara a query com os placeholders
    mysqli_stmt_bind_param($stmt,'ss',$email,$senha); // passa os paramentos e os tipos deles: 'sss' = stringstringstring
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);
    $usuario = mysqli_fetch_assoc($resultado);
    if($usuario) {
            $retorno["status"] = "s";
            $retorno["mensagem"] = "Log-in realizado com sucesso!";
        } else {
            $retorno["status"] = "n";
            $retorno["mensagem"] = "Erro ao realizar login";
        }

    $json = json_encode($retorno);
    echo $json;
        // passa tudo pelo retorno de volta pro js

    mysqli_stmt_close($stmt);
    mysqli_close($con);

?>