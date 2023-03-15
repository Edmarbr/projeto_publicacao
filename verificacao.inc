<?php

    session_start();
    
    if (isset($_SESSION["codigo"]) and isset($_GET["num"])){
        $numSessao = $_SESSION["codigo"];
        $numURL = $_GET["num"];
        
        if ($numSessao != $numURL){
            echo "Você não tem permissão";
            exit;
        }
    } else {
        echo "Você não tem permissão";
        exit;
    }

?>