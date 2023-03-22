<?php
    
    include "../conexaoBD.inc";
    session_start();
    
    $email = $_POST["form_email"];
    $senha = $_POST["form_senha"];

    $comandoSQL = "SELECT email, nome, senha FROM cadastro WHERE email = '$email' LIMIT 1";
    $resultadoConsul = mysqli_query($conectarBD, $comandoSQL);
    $linhas_afetadas = mysqli_affected_rows($conectarBD);

    $usu = mysqli_fetch_row($resultadoConsul);

    if (password_verify($senha, $usu[2])){
        $numeroUsu = rand(1000000, 10000000);
        $_SESSION["codigo"] = $numeroUsu;
        $_SESSION["nome"] = mysqli_fetch_row($resultadoConsul)[1];
        header("Location: ../index/principal.php?num=$numeroUsu");
    } else {
        header("Location: login.html");
        exit;
    }

    mysqli_close($conectarBD);
?>