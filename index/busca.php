<?php

    session_start();
    if (isset($_GET["form_pesquisa"])){
        header("Location: principal.php?num=$_SESSION[codigo]&q=$_GET[form_pesquisa]");   // redireciona o usuário para a página principal com a pesquisa feita na url  
    }

?>