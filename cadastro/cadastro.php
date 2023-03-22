<?php

        session_start();

        include "../conexaoBD.inc";

        $nome = $_POST["form_nome"];
        $email = $_POST["form_email"];
        $senha = $_POST["form_senha"];

        $numeroUsu = rand(1000000, 10000000);
        $_SESSION["codigo"] = $numeroUsu;
        $_SESSION["nome"] = $nome;

        $comandoSQl = "INSERT INTO cadastro (nome, email, senha) VALUES ('$nome', '$email', '$senha');";
        mysqli_query($conectarBD, $comandoSQl);
        header("Location: ../index/principal.php?num=$numeroUsu");

        mysqli_close($conectarBD);

?>