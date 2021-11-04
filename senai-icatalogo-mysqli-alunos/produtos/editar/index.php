<?php

  session_start();

  require('../../database/conexao.php');

  $produtoId = $_GET["id"];

  /**** RECUPERA OS DADOS DE PRODUTO  ****/
  $sqlProduto = "SELECT * FROM tbl_produto WHERE id = $produtoId";
  $resultado = mysqli_query($conexao, $sqlProduto);
  $produto = mysqli_fetch_array($resultado);

/**** RECUPERA OS DADOS DE CATEGORIA  ****/
$sqlCategoria = "SELECT * FROM tbl_categoria";
$resultado = mysqli_query($conexao, $sqlCategoria);

  // echo '<pre>';
  // var_dump($produto);
  // echo '</pre>';
  // exit;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles-global.css" />
  <link rel="stylesheet" href="./editar.css" />
  <title>Editar Produtos</title>

</head>

<body>

    <!-- INCLUSÃO DO COMPONENTE HEADER -->
    <?php include('../../componentes/header/header.php'); ?>
 
  <div class="content">

    <section class="produtos-container">

      <main>

        <form class="form-produto" method="POST" action="../acoes.php" enctype="multipart/form-data">
         
          <input type="hidden" name="acao" value="editar" />
          
          <input type="hidden" name="produtoId" value="<?php echo $produtoId?>" />
          
          <h1>Editar Produto</h1>
          
          <ul>

            <?php
              
              if (isset($_SESSION["erros"])) {
                
                foreach ($_SESSION["erros"] as $erro) {
                  
                  echo "<li> $erro </li>";

                }

                unset($_SESSION["erros"]);

              }
            
            ?>
      
          </ul>

          <div class="input-group span2">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" value="<?php echo $produto["descricao"]?>" id="descricao" >
          </div>

          <div class="input-group">
            <label for="peso">Peso</label>
            <input type="text" name="peso" value="<?php echo number_format($produto["peso"], 2, ",", ".")?>" id="peso" >
          </div>

          <div class="input-group">
            <label for="quantidade">Quantidade</label>
            <input type="text" name="quantidade" value="<?php echo $produto["quantidade"]?>" id="quantidade" >
          </div>

          <div class="input-group">
            <label for="cor">Cor</label>
            <input type="text" name="cor" value="<?php echo $produto["cor"]?>" id="cor" >
          </div>

          <div class="input-group">
            <label for="tamanho">Tamanho</label>
            <input type="text" value="<?php echo $produto["tamanho"]?>" name="tamanho" id="tamanho">
          </div>

          <div class="input-group">
            <label for="valor">Valor</label>
            <input type="text" name="valor" value="<?php echo number_format($produto["valor"], 2, ",", ".")?>" id="valor" >
          </div>

          <div class="input-group">
            <label for="desconto">Desconto</label>
            <input type="text" name="desconto" value="<?php echo $produto["desconto"]?>" id="desconto">
          </div>

          <div class="input-group">

            <label for="categoria">Categoria</label>

            <select id="categoria" name="categoria" >

            <option value="">SELECIONE</option>

            <?php 
              while ($categoria = mysqli_fetch_array($resultado)) { 
            ?>

                <option value="<?php echo $categoria["id"]?>" 
                <?php echo $categoria["id"] == $produto["categoria_id"] ? "selected"  : "" ?>
                >
              
                <?php echo $categoria["descricao"]?>

                </option>

            <?php } ?>
         
           </select>

          </div>

          <div class="input-group">
            <label for="categoria">Foto</label>
            <input type="file" name="foto" id="foto" accept="image/*" />
          </div>
         
          <button onclick="javascript:window.location.href = '../'">Cancelar</button>
          <button>Salvar</button>

        </form>

      </main>

    </section>

  </div>

  <footer>
    SENAI 2021 - Todos os direitos reservados
  </footer>
  
</body>

</html>