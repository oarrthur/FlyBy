<?php

class db{

    //host
    private  $host = 'localhost';

    //usuario
    private $usuario = 'root';

    //senha
    private $senha = '';

    //banco de dados
    private $database = 'twitter_clone';

    public function conecta_mysql(){
        //Criando a conexão com o MySql
        $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

        //Ajustar o charset de comunicação entre a aplicação e o banco de dados
        mysqli_set_charset($con, 'utf8');

        //Verificação de erro na conexão
        if(mysqli_connect_errno()){
            echo "Erro ao tentar se conectar com o BD MySQL:".mysqli_connect_error();
        }

        return $con;
    }

}