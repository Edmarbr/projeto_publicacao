<?php
    
    include "../conexaoBD.inc";
    session_start();
    
    if (isset($_POST["form_email"]) && isset($_POST["form_senha"])) {
        $email = $_POST["form_email"];
        $senha = $_POST["form_senha"];

        $Sql = mysqli_query($conectarBD, "SELECT email, nome, senha FROM cadastro WHERE email = '$email' AND senha = '$senha'");
        
        $DadosUsu = mysqli_fetch_row($Sql);

        if (password_verify($senha, $DadosUsu[2])) {
            $numeroUsu = rand(1000000, 10000000);
            $_SESSION["codigo"] = $numeroUsu;
            $_SESSION["nome"] = mysqli_fetch_row($Sql)[1];
            header("Location: ../index/principal.php?num=$numeroUsu");
        } else {
            header("Location: login.html");
            exit;
        }
    }

    mysqli_close($conectarBD);
?>