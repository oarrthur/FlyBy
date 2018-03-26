<?php

    session_start();

    require_once ('db.class.php');

    $usuario = $_POST['usuario'];
    $senha = md5($_POST['senha']);

    //Comando SQL
    $sql = "SELECT id,  usuario, email FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    //Retorna false ou um resource que é uma referencia externa ao php
    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){
        //Transforma o resource em array permitindo explorar os dados
        $dados_usuario = mysqli_fetch_array($resultado_id);

        if(isset($dados_usuario['usuario'])){

            $_SESSION['id_usuario'] = $dados_usuario['id'];
            $_SESSION['usuario'] = $dados_usuario['usuario'];
            $_SESSION['email'] = $dados_usuario['email'];

            header('Location: home.php');
        } else{
            header('location: index.php?erro=1');
        }
    } else{
        echo 'Erro na execução da consulta, favor entrar em contato com o ADMIN do site';
    }


