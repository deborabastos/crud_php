<?php 

session_start();

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


    <title>Login</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #563d7c;"">
            <div class="container">
                <a class="navbar-brand" href="#">&lt;Desafio PHP/&gt;</a>

            </div>
        </nav>
    </header> 


    <main>
        <div class="container my-5">
            <div class="col-6 mx-auto">

                <form action="includes/validaLogin.php" method="POST" class="">
                    
                    <!-- Mensagem de erro -->
                    <p class="text-danger font-weight-bold"> 
                        <?php 
                        if (!empty($_GET['msg'])){  
                            echo  $_GET['msg'];
                        };
                        ?> 
                    </p>
                    <p class="text-primary font-weight-bold"> 
                        <?php 
                        if (!empty($_GET['msg_cad'])){  
                            echo  $_GET['msg_cad'];
                        };
                        ?> 
                    </p>
                    
                    <div class="form-group">
                        <label for="login-email">E-mail:</label>
                        <input type="text" name="login-email" id="login-email" class="form-control" placeholder="" value="">
                    </div>

                    <div class="form-group">
                        <label for="login-senha" class="mb-0">Senha:</label>
                        <input type="password" name="login-senha" id="login-senha" class="form-control" placeholder="" value="">
                    </div>
                    
                    <div class="form-group">
                        <small id="nao-cadastro" class="form-text text-primary">
                                <a href="createUsuarioNovo.php">Ainda não tenho cadastro</a>
                        </small>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="login-submit" value="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
<!-- 
                <form action="includes/logout.inc.php">
                    <button type="submit" name="logout-submit" value="submit" class="btn btn-primary btn-block">Logout</button>
                </form> -->



            </div>
        </div>






        </div>
    </main>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>