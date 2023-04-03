<?php
    
    include "../conexaoBD.php";
    session_start();
    $nomeUsu = $_SESSION["nome"];

    function PublicarImagem($nomeUsua, $error, $size, $name, $tmp_name, $titulo, $descricao)
    {
        include "../conexaoBD.php";

        if ($error) {       // verificação de erro
            header("Location: publicacao.php?num=$_SESSION[codigo]");
            exit;
        }

        if ($size > 5000000) {      // verificação do tamanho do arquivo
            header("Location: publicacao.php?num=$_SESSION[codigo]");
            exit;
        }

        $localArquivos = "../arquivos/";
        $nomeArquivo = $name;
        $novoNomeArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
        
        if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg") {      // verificação da extensão
            header("Location: publicacao.php?num=$_SESSION[codigo]");
            exit;
        }
            

        $path = $localArquivos . $novoNomeArquivo . "." . $extensao;

        $moverArqui = move_uploaded_file($tmp_name, $path);

        if ($moverArqui) {
            date_default_timezone_set('America/Sao_Paulo');     // define o fuso horário padrão
            $data = date("Y/m/d");
            $hora = date("H:i:s");      // data e hora serão usados para definir o ordem das publicações
            mysqli_query($conectarBD, "INSERT INTO arquivos (nome_usu, nome, path, data_, hora, titulo, descricao) VALUES ('$nomeUsua', '$name', '$path', '$data', '$hora', '$titulo', '$descricao')");
        }
    }

    if (isset($_FILES["Farquivos"]) and isset($_POST["Ftitulo"]) and $_POST["Fdescricao"]) {
        $arquivos = $_FILES["Farquivos"];
        $tituloPubli = $_POST["Ftitulo"];
        $descricaoPubli = $_POST["Fdescricao"];

        PublicarImagem($nomeUsu, $arquivos['error'], $arquivos['size'], $arquivos['name'], $arquivos['tmp_name'], $tituloPubli, $descricaoPubli);

        header("Location: principal.php?num=$_SESSION[codigo]");
    }
    mysqli_close($conectarBD);
?>
