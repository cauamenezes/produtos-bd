<?php

session_start();

//Conexão com banco de dados
require("../database/conexao.php");

//Função de validação
function vaildarCampos()
{

    $erros = [];

    if (!isset($_POST['descricao']) || $_POST['descricao'] == "") {

        $erros[] = "O campo descrição é de preenchimento obrigatório";
    }

    return $erros;
}

/* Tratamento dos dados vindos do formulário

- Tipos de ação
- Execução dos processos da ação solicitada
*/

switch ($_POST["acao"]) {
    case 'inserir':

        $erros = vaildarCampos();

        if (count($erros) > 0) {

            $_SESSION["erros"] = $erros;

            header("location: index.php");

            exit();
        }
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

    case 'deletar':

        $categoriaId = $_POST['categoriaId'];

        $sql = "DELETE FROM tbl_categoria WHERE id = $categoriaId";

        $resultado = mysqli_query($conexao, $sql);

        header("location: index.php");

        break;

    case 'editar':

        $id = $_POST["id"];
        $descricao = $_POST["descricao"];

        $sql = "UPDATE tbl_categoria SET descricao = '$descricao' WHERE id = $id";

        // echo $sql; exit;

        $resultado = mysqli_query($conexao, $sql);

        header('location: index.php');

        break;

    default:
        # code...
        break;
};
