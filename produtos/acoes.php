<?php

require("../database/conexao.php");

// var_dump($_POST);exit;
switch ($_POST["acao"]) {

    case 'inserir':

        //recupera o nome do arquivo
        $nomeArquivo = $_FILES["foto"]["name"];

        //recupera a extensão do arquivo
        $extensao = pathinfo($nomeArquivo, PATHINFO_EXTENSION);

        //define um novo nome para o arquivo de imagem
        $novoNome = md5(microtime()) . "." . $extensao;

        //upload do arquivo
        move_uploaded_file($_FILES["foto"]["tmp_name"], "fotos/$novoNome");

        //inserção de dados na base de dados do mysql

        //recebimento dos dados
        $descricao = $_POST["descricao"];
        $peso = $_POST["peso"];
        $quantidade = $_POST["quantidade"];
        $cor = $_POST["cor"];
        $tamanho = $_POST["tamanho"];
        $valor = $_POST["valor"];
        $desconto = $_POST["desconto"];
        $categoriaId = $_POST["categoria"];

        //criação da instrução sql de inserção
        $sql = "INSERT INTO tbl_produto
        (descricao, peso, quantidade, cor, tamanho, valor, desconto, imagem, categoria_id)
         VALUES ('$descricao', $peso, $quantidade, '$cor', '$tamanho', $valor, $desconto, '$novoNome', $categoriaId)";

        //execução 
        $resultado = mysqli_query($conexao, $sql);

        //redireciona para o index
        header("location: index.php");

        break;

    case "editar":

        //atualizando a imagem do produto

        $idProduto = $_POST["idProduto"];

        if($_FILES["foto"]["error"] != UPLOAD_ERR_NO_FILE) {

            $sqlImagem = "SELECT imagem FROM tbl_produto WHERE id = $idProduto";

            $resultado = mysqli_query($conexao, $sqlImagem);
            $produto = mysqli_fetch_array($resultado);

            echo "/fotos/" . $produto["imagem"];
            exit;

        }

        //captura os dados de texto e de número
        $descricao = $_POST["descricao"];
        $peso = str_replace(",", ".", $_POST["peso"]);
        $peso = str_replace(".", "", $peso);

        $valor = str_replace(",", ".", $_POST["valor"]);
        $valor = str_replace(".", "", $valor);

        $quantidade = $_POST["quantidade"];
        $cor = $_POST["cor"];
        $tamanho =$_POST["tamanho"];
        $desconto = $_POST["desconto"];
        $idCategoria = $_POST["categoria"];



        break;

    default:
        # code...
        break;
}
