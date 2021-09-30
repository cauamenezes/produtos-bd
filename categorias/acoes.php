<?php

//Conexão com banco de dados
require("../database/conexao.php");

/* Tratamento dos dados vindos do formulário

- Tipos de ação
- Execução dos processos da ação solicitada
*/

switch ($_POST["acao"]) {
    case 'inserir':
        // echo "INSERIR"; exit;
        $descricao = $_POST["descricao"];

        //MONTAGEM DA INSTRUÇÃO SQL DE INSERÇÃO DE DADOS
        $sql = "INSERT INTO tbl_categoria (descricao) VALUES ('$descricao')";

        // echo $sql; exit;

        $resultado = mysqli_query($conexao, $sql);

        header("location: index.php");

        // echo "<pre>";
        // var_dump($resultado);
        // echo "</pre>";
        // exit;

        break;

    default:
        # code...
        break;
}
