<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #563d7c;"">
    <div class="container">
        <a class="navbar-brand" href="#">&lt;Desafio PHP/&gt;</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="indexProduto.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="createProduto.php">Adicionar Produto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="createUsuario.php">Usuários</a>
                </li>
            </ul>

            <?php
                if (!isset($_SESSION['nome'])){
                    echo '<form action="includes/logout.inc.php" method="post">
                            <span class="nav-item">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="index.php">Logout</a>
                                    </li>
                                </ul>
                            </span>
                          </form>';
                };
            
            ?>
        </div>
    </div>
</nav>