<?php

        session_start();

        include "../conexaoBD.inc";

        $nome = $_POST["form_nome"];
        $email = $_POST["form_email"];
        $senha = $_POST["form_senha"];
        $confirm_senha = $_POST["form_confirm_senha"];

        $verif_senhas = mysqli_query($conectarBD, "SELECT senha FROM cadastro WHERE senha = '$senha';");
        $linhas_afetadas = mysqli_affected_rows($conectarBD);

        if ($linhas_afetadas > 0){
            header("Location: cadastro.html");
            exit;
        } else if ($senha != $confirm_senha){
            header("Location: cadastro.html");
            exit;
        }

        $numeroUsu = rand(1000000, 10000000);
        $_SESSION["codigo"] = $numeroUsu;

        $comandoSQl = "INSERT INTO cadastro (nome, email, senha) VALUES ('$nome', '$email', '$senha');";
        mysqli_query($conectarBD, $comandoSQl);
        header("Location: ../index/principal.php?num=$numeroUsu");

        mysqli_close($conectarBD);

    ?>