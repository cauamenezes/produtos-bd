<?php

/*
PAREMETROS DE CONEXÃO MYSQLI
1 - host -> onde o banco de dados esta rodando 
2 - user -> usuário do banco de dados
3 - password -> senha do usuário do banco de dados
4 - database -> nome do banco de dados
*/

const HOST = 'localhost';
const USER = 'root';
const PASSWORD = 'bcd127';
const DATABASE = 'icatalogo';

$conexao = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if($conexao === false){

    die(mysqli_connect_error());

}

// echo '<pre>';
// var_dump($conexao);
// echo '</pre>';

?>