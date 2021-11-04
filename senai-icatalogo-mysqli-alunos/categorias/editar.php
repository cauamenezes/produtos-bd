<?php

    require('../database/conexao.php');

    $idCategoria = $_GET['id'];

    $sql =  "SELECT * FROM tbl_categoria WHERE id = $idCategoria";

    $resultado = mysqli_query($conexao, $sql);

    $categoria = mysqli_fetch_array($resultado);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles-global.css" />
    <link rel="stylesheet" href="./categorias.css" />
    <title>Administrar Categorias</title>
</head>

<body>
    <?php
    include("../componentes/header/header.php");
    ?>
    <div class="content">
        <section class="categorias-container">
            <main>
                <form class="form-categoria" method="POST" action="./acoes.php">
                    <input type="hidden" name="acao" value="editar" />
                    <input type="hidden" name="id" value="<?php echo $categoria["id"]?>" />
                    <h1 class="span2">Editar Categorias</h1>
                    
                    <ul>
                    <?php
                        if(isset($_SESSION["erros"])){

                            foreach ($_SESSION["erros"] as $erro) {
                                
                    ?>

                        <li><?php echo $erro?></li>

                    <?php
                        }//fim do foreach

                        //Limpa a variável de sessão
                        session_unset();
                        
                        //Destroi a sessão
                        session_destroy();

                    }//fim do if 
                    ?>
                    </ul>

                    <div class="input-group span2">
                        <label for="descricao">Descrição</label>
                        <input type="text" name="descricao" id="descricao" value="<?php echo $categoria["descricao"]?>"/>
                    </div>
                    <button type="button" onclick="javascript:window.location.href = '../produtos/'">Cancelar</button>
                    <button>Editar</button>
                </form>

            </main>
        </section>
    </div>
</body>

</html>