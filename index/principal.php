<?php
    include "../verificacao.php";
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
<body>
    <header>
        <div class="div_header">
            <h1><a href="#"><abbr title="Página inicial">Home</abbr></a></h1>
            <form action="busca.php" method="get">
                <div class="div_pesquisa">
                    <input type="text" name="form_pesquisa" id="" placeholder="Search" autocomplete="off">
                    <button type="submit"></button>
                </div>
            </form>
                <nav id="nav">
                    <ul class="logout">
                        <form action="logout.php" method="get" name="formLogout" id="form_logout">
                            <abbr title="Logout"><input type="button" value="Logout" id="BtnLogout"></abbr>
                        </form>
                    </ul>
                </nav>
        </div>
    </header>

    <main>
        <?php
            include "../conexaoBD.php";

            if (isset($_GET["q"])){     // se exitir alguma pesquisa
                $busca = $_GET["q"];
                $select = mysqli_query($conectarBD, "SELECT nome_usu, titulo, descricao, path, data_, hora, nome FROM arquivos WHERE titulo LIKE '%$busca%' OR descricao LIKE '%$busca%' ORDER BY data_ DESC, hora DESC, nome;");       // busca o título ou descrição que corresponde a busca feita
            } else {
                $select = mysqli_query($conectarBD, "SELECT nome_usu, titulo, descricao, path, data_, hora, nome FROM arquivos ORDER BY data_ DESC, hora DESC, nome;");     // retorna todas as publicações
            }

            if (isset($busca) && (!empty($busca))){                     // se a busca existir e não for vazia
                if (empty($busca) or mysqli_num_rows($select) == 0){    // verifica se foi encontrado algum resultado de acordo com a busca feita
                    echo "<section class=secPubli> Não foi possível encontrar a pesquisa</section>";
                }
            }

            while ($valores = mysqli_fetch_row($select)){
                if ($valores[0] == $_SESSION["nome"]) {
                    echo "<section class=secPubli>
                        <h2>$valores[0]</h2>
                        <p class=pTitulo>$valores[1]</p>
                        <div class='divImg'><img src='$valores[3]' alt='Imagem da publicação' class='imgPubli'></div>
                        <br><hr><br>
                        <div class='divFooterPubli'>
                            <p class=pDescricao>Descrição: $valores[2]</p>
                            <a href='excluir.php?img=$valores[6]&path=$valores[3]'><img src='../imagens_icons/icons/icon_remover.png' alt='Imagem de excluir publicação' class='imgRemove'></a>
                        </div>
                      </section>";
                } else {
                    echo "<section class=secPubli>
                            <h2>$valores[0]</h2>
                            <p class=pTitulo>$valores[1]</p>
                            <div><img src='$valores[3]' alt='Imagem da publicação' class='imgPubli'></div>
                            <br><hr><br>
                            <div class='divFooterPubli'>
                                <p class=pDescricao>Descrição: $valores[2]</p>
                            </div>
                          </section>";
                }
            }                                           // adiciona as publicações no site
            mysqli_close($conectarBD);
        ?>
    </main>

    <abbr title="Nova publicação">
        <div class="newPubli"><a href="<?php echo "publicacao.php?num=$_SESSION[codigo]" ?>">+</a></div>
    </abbr>
    
    <footer>
        
    </footer>
    <script src="../script/script.js"></script>
</body>
</html>