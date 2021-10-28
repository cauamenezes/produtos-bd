<?php

require("../../database/conexao.php");

function realizarLogin($usuario, $senha, $conexao) {

    $sql = "SELECT * FROM tbl_administrador WHERE usuario = '$usuario' AND senha = '$senha'";

    $resultado = mysqli_query($conexao, $sql);

    $dados = mysqli_fetch_array($resultado);

    if(isset($dados["usuario"]) && isset($dados["senha"])) {

        echo 'login efetuado!';
    } else {
        echo 'alguma coisa deu errada!';
    }
}

realizarLogin('admin', '123', $conexao);

?>