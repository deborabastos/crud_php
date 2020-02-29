<?php
session_start();

require('./includes/usuarios.inc.php');

if (!isset($_GET['id'])){
    include_once('./includes/not_found.php');
    exit;
}

$usuarioId = $_GET['id'];

$usuario = getUsuarioById($usuarioId);

if (!isset($usuario)){
    include_once('./includes/not_found.php');
    exit;
}


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


    <title><?= $usuario['nome'] ?></title>
</head>
<body>
    <header>
        <?php include("./includes/nav.php"); ?>
    </header>    

    <main>
        <div class="container my-5">
            <div class="row px-3">
                <h1 class="mr-auto"><?= $usuario['nome'] ?></h1>
                <div>
                    <input type='button' class="btn btn-primary btn-sm mt-2" value='Voltar' onclick='history.go(-1)' />
                </div>
            </div>


            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Nome: </th>
                        <td> <?= $usuario['nome']?> </td>
                    </tr>
                    <tr>
                        <th>E-mail: </th>
                        <td> <?= $usuario['email']?> </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2" style="text-align: center">
                                <a href="editUsuario.php?id=<?= $usuario['id']?>" role='button' class="btn btn-info btn-sm" >Editar</a>
                                <form method="POST" action="deleteUsuario.php" class="d-inline-block">
                                    <input type="hidden" name="id" value="<?= $usuario['id']; ?>">
                                    <button class="btn btn-danger btn-sm">Excluir</button>
                                </form> 
                        </td>
                    </tr>
                </tbody>


            </table>
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