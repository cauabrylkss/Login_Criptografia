<?php

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    // conecta os valores do formulario (vindo do fetch -> FormData)
    $con = mysqli_connect("localhost:3306", "root", "*senha*", "*bancodados*");
    $stmt = mysqli_stmt_init($con); // cria espaco na memoria pros comandos
    $query = "insert into usuario(nome, email, senha) values (?,?,?)";
    mysqli_stmt_prepare($stmt, $query); //prepara a query com os placeholders
    mysqli_stmt_bind_param($stmt,'sss',$nome,$email,$senha); // passa os paramentos e os tipos deles: 'sss' = stringstringstring
    $resultado = mysqli_stmt_execute($stmt);
    if($resultado == true) {
            $retorno["status"] = "s";
            $retorno["mensagem"] = "Cadastrado com sucesso!";
        } else {
            $retorno["status"] = "n";
            $retorno["mensagem"] = "Erro ao cadastrar o usuário!";
        }

    $json = json_encode($retorno);
    echo $json;
        // passa tudo pelo retorno de volta pro js



?>