<?php
    
    include "../conexaoBD.inc";
    session_start();

    function PublicarImagem($error, $size, $name, $tmp_name, $titulo, $descricao)
    {
        include "../conexaoBD.inc";
        // // verificação de erro
        if ($error)
            die("Algo deu errado ao enviar o arquivo");

        //     // verificação do tamanho do arquivo
        if ($size > 5000000)
            die("Arquivo muito grande! MAX: 5MB");

        $localArquivos = "../arquivos/";
        $nomeArquivo = $name;
        $novoNomeArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
        
        // verificação da extensão
        if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg")
            die("O tipo de arquivo selecionado não é aceito!");

        $path = $localArquivos . $novoNomeArquivo . "." . $extensao;

        $moverArqui = move_uploaded_file($tmp_name, $path);

        if ($moverArqui){
            date_default_timezone_set('America/Sao_Paulo');     // define o fuso horário padrão do site
            $data = date("Y/m/d");
            $hora = date("H:i:s");
            mysqli_query($conectarBD, "INSERT INTO arquivos (nome, path, data_, hora, titulo, descricao) VALUES ('$name', '$path', '$data', '$hora', '$titulo', '$descricao');") or die(mysqli_error($conectarBD));
        }
    }

    if (isset($_FILES["Farquivos"]) and isset($_POST["Ftitulo"]) and $_POST["Fdescricao"]){
        $arquivos = $_FILES["Farquivos"];
        $tituloPubli = $_POST["Ftitulo"];
        $descricaoPubli = $_POST["Fdescricao"];
        PublicarImagem($arquivos['error'], $arquivos['size'], $arquivos['name'], $arquivos['tmp_name'], $tituloPubli, $descricaoPubli);
        header("Location: principal.php?num=$_SESSION[codigo]");
    }
    mysqli_close($conectarBD);
