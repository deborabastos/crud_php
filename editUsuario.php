<?php

// ****************************** VALIDAÇAO ****************************** 
// Para que não dê erro em lembrar os dados digitados após a primeira submissão, dizemos que a variável é vazia até que seja definido algo
$nome = $email = $hash = '';

// ********************************* CHAMA FUNÇÕES *********************************
require_once('usuarios.php');


// ********************************* VERIFICAÇÕES *********************************

// Verifica se foi passado parâmetro ID, se não, retorna erro
if (!isset($_GET['id'])){
    include_once('./includes/not_found.php');
    exit;
}

//Retira o id da URL (GET) e procura o usuario com essa ID no json, retornando dados na variável $usuario
$usuarioId = $_GET['id'];
$usuario = getUsuarioById($usuarioId);

// Verifica se existe o ID, se não, retorna erro
if (!isset($usuario)){
    include_once('./includes/not_found.php');
    exit;
};

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Meu CSS -->
    <link rel="stylesheet" href="style.css">


    <title>Editar Usuário</title>
</head>
<body>
    <header>
        <?php include("./includes/nav.php"); ?>
    </header>    


    <main>
        <div class="container my-5">
                <div class="col-12">
                    <h1>Editar Usuário</h1>
                    
                    <form action="#" method="POST" class="">
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" id="nome" class="form-control" value="<?= $usuario['nome'] ?>" >
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="text" name="emai." id="email" class="form-control" placeholder="" value="<?= $usuario['email'] ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="senhaAtual" class="mb-0">Senha atual:</label>
                                <input type="password" name="senhaAtual" id="senhaAtual" class="form-control" placeholder="" value="">
                            </div>

                            <div class="form-group">
                                <label for="novaSenha" class="mb-0">Nova senha:</label>
                                    <small id="novaSenha" class="form-text text-muted mt-0 mb-1">
                                        Mínimo 6 caracteres
                                    </small>
                                <input type="password" name="novaSenha" id="novaSenha" class="form-control" placeholder="" value="">
                            </div>
                            
                            <div class="form-group">
                                <label for="confirmaSenha">Confirmar nova senha:</label>
                                <input type="password" name="confirmaSenha" id="confirmaSenha" class="form-control" placeholder="" value="">
                                                                                                  
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit" value="submit" class="btn btn-warning btn-block">Editar</button>
                            </div>
                    </form>
                </div>
            </div>






        </div>
    </main>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>
</html>