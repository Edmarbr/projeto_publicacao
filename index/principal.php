<?php
    include "../verificacao.inc";
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=1">
    <link rel="stylesheet" href="mediasQueries.css?v=1">
    <title>Home</title>
</head>
<body onresize="tamanho()">
    <header>
        <div class="div_header">
            <h1><a href="#"><abbr title="Página inicial">Home</abbr></a></h1>
            <form action="busca.php">
                <div class="div_pesquisa">
                    <input type="text" name="form_pesquisa" id="" placeholder="Search" autocomplete="off">
                    <button type="submit"></button>
                </div>
            </form>
                <nav id="nav">
                    <ul class="logout">
                        <form action="logout.php" method="get" name="formLogout">
                            <abbr title="Logout"><input type="submit" value="Logout"></abbr>
                        </form>
                    </ul>
                </nav>
        </div>
    </header>

    <main>
        <?php
            include "../conexaoBD.inc";

            if (isset($_GET["q"])){
                $busca = $_GET["q"];
                $select = mysqli_query($conectarBD, "SELECT nome_usu, titulo, descricao, path, data_, hora FROM arquivos WHERE titulo LIKE '%$busca%' OR descricao LIKE '%$busca%' ORDER BY data_ DESC, hora DESC;");
            } else {
                $select = mysqli_query($conectarBD, "SELECT nome_usu, titulo, descricao, path, data_, hora FROM arquivos ORDER BY data_ DESC, hora DESC;");
            }

            if (isset($busca) && (!empty($busca))){
                if (empty($busca) or mysqli_num_rows($select) == 0){
                    echo "<section class=secPubli> Não foi possível encontrar a pesquisa</section>";
                }
            }

            while ($valores = mysqli_fetch_row($select)){
                echo "<section class=secPubli> <h2>$valores[0]</h2>";
                echo "<p class=pTitulo>$valores[1]</p>";
                echo "<img src='$valores[3]' alt='Imagem da publicação' class='imgPubli'>";
                echo "<br><hr><br>";
                echo "<p class=pDescricao>Descrição: $valores[2]</p></section>";
            }
            mysqli_close($conectarBD);
        ?>
    </main>

    <abbr title="Nova publicação">
        <div class="newPubli"><a href="<?php echo "publicacao.php?num=$_SESSION[codigo]" ?>">+</a></div>
    </abbr>

    <script src="../script/script.js"></script>
</body>
</html>