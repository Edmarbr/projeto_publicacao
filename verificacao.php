<?php

    session_start();
    
    if (isset($_SESSION["codigo"]) and isset($_GET["num"])){
        $numSessao = $_SESSION["codigo"];
        $numURL = $_GET["num"];
        
        if ($numSessao != $numURL){
            header("Location: ../login/login.html");
        }
    } else {
        header("Location: ../login/login.html");
    }

?>