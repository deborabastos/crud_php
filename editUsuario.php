<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
                                <input type="text" name="nome" id="nome" class="form-control" value=" " >
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="text" name="emai." id="email" class="form-control" placeholder="" value="">
                            </div>
                            
                            <div class="form-group">
                                <label for="senha" class="mb-0">Senha:</label>
                                    <small id="senha" class="form-text text-muted mt-0 mb-1">
                                        Mínimo 6 caracteres
                                    </small>
                                <input type="text" name="senha" id="senha" class="form-control" placeholder="" value="">
                            </div>
                            
                            <div class="form-group">
                                <label for="confirma-senha">Confirmar senha:</label>
                                <input type="text" name="confirma-senha" id="confirma-senha" class="form-control" placeholder="" value="">
                                                                                                  
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