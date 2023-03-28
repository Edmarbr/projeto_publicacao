<?php

        session_start();

        include "../conexaoBD.inc";
        if (isset($_POST["form_nome"]) && isset($_POST["form_email"]) && isset($_POST["form_senha"])) {
                $nome = $_POST["form_nome"];
                $email = $_POST["form_email"];
                $senha = password_hash($_POST["form_senha"], PASSWORD_DEFAULT);
                
                $numeroUsu = rand(1000000, 10000000);
                $_SESSION["codigo"] = $numeroUsu;
                $_SESSION["nome"] = $nome;

                $verificarEmail_Senha = mysqli_query($conectarBD, "SELECT email, senha FROM cadastro WHERE email = '$email'");
                $Retornosql = mysqli_fetch_row($verificarEmail_Senha);

                if ($Retornosql[0] == $email) {                            // verificação se existe um email ou senha já registrado no banco de dados
                        header("Location: cadastro.html");
                } else {
                        mysqli_query($conectarBD, "INSERT INTO cadastro (nome, email, senha) VALUES ('$nome', '$email', '$senha')");
                        header("Location: ../index/principal.php?num=$numeroUsu");
                }
        }
        

        mysqli_close($conectarBD);

?>