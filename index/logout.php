<?php

    session_start();
    
    header("Location: index.html");
    unset($_SESSION["codigo"]);
    unset($_GET["num"]);
    session_destroy();

?>