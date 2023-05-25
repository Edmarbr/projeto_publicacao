<?php

    include "../verificacao.php";

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova publicação</title>
    <link rel="stylesheet" href="style.css?v=1">
    <link rel="stylesheet" href="mediasQueries.css?v=1">
</head>
<body class="body_publicacao">
    <a href=<?php echo "principal.php?num=$_SESSION[codigo]" ?> ><img src="../imagens_icons/icons/icons8-esquerda-96.png" alt="Imagem de volta a página principal"></a>
    <form action="verifPubli.php" method="post" enctype="multipart/form-data">
        <h1>Nova publicação</h1>
        <div class="titulo title_desc">
            <label for="ititulo">Título:</label>
            <input type="text" name="Ftitulo" id="ititulo" class="inputs_texts" required maxlength="100" autocomplete="off"><br><br>
        </div>

        <div class="descricao title_desc">
            <label for="idescricao">Descrição:</label>
            <input type="text" name="Fdescricao" id="idescricao" class="inputs_texts" required maxlength="255" autocomplete="off"><br><br>
        </div>

        <div class="selecArquivo">
            <label for="iarquivos">Selecionar imagem</label>
            <input type="file" name="Farquivos" id="iarquivos" required accept="image/*">
            <img src="../imagens_icons/imgs/img-preview.png" alt="Preview da imagem" id="imgPreview" class="imgPreview">
        </div>

        <div class="botoes">
            <input type="submit" value="Publicar">
            <input type="reset" value="Limpar">
        </div>
    </form>

    <script>
        // Configurações para mostra um preview da imagem que será publicada
        const imgPreview = document.getElementById("imgPreview")
        const inputFile = document.getElementById("iarquivos")

        inputFile.addEventListener("change", () => {
            if (inputFile.files[0]) {
                imgPreview.src = URL.createObjectURL(inputFile.files[0])
            }
        })
    </script>
</body>
</html>
