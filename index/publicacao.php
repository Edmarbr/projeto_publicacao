<?php

    include "../verificacao.inc";

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova publicação</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="mediasQueries.css">
</head>
<body class="body_publicacao">
    <form action="verifPubli.php" method="post" enctype="multipart/form-data">
        <h1>Nova publicação</h1>
        <div class="titulo">
            <label for="ititulo">Título:</label>
            <input type="text" name="Ftitulo" id="ititulo" class="inputs_texts" required maxlength="100" autocomplete="off"><br><br>
        </div>

        <div class="descricao">
            <label for="idescricao">Descrição:</label>
            <input type="text" name="Fdescricao" id="idescricao" class="inputs_texts" required maxlength="255" autocomplete="off"><br><br>
        </div>

        <div class="selecArquivo">
            <label for="iarquivo">Selecione o arquivo</label>
            <input type="file" name="Farquivos" id="iarquivos" required><br><br>
        </div>

        <div class="botoes">
            <input type="submit" value="Publicar">
            <input type="reset" value="Limpar">
        </div>
    </form>
</body>
</html>
