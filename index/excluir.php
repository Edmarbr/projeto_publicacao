<?php

    session_start();
    include "../conexaoBD.php";
    if (isset($_GET["img"]) && isset($_GET["path"])) {
        mysqli_query($conectarBD, "DELETE FROM arquivos WHERE nome = '$_GET[img]'");
        unlink("../arquivos/$_GET[path]");
        mysqli_close($conectarBD);
        header("Location: principal.php?num=$_SESSION[codigo]");
    } else {
        header("Location: principal.php?num=$_SESSION[codigo]");
        exit;
    }

?>