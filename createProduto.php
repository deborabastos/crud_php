<?php
// print_r($_POST);


// Para que não dê erro em lembrar os dados digitados após a primeira submissão, dizemos que a variável é vazia até que seja definido algo
$nome = $preco = $descricao = $imagem = '';

// Definindo array de erros
$errors = array('nome' => '','preco' => '', 'imagem' => '');


// Executar apenas após o SUBMIT
if(isset($_POST['submit'])){

    // Checando nome
    if(empty($_POST['nome'])){
        $errors['nome'] = 'Você precisa digitar o nome do produto';

    } elseif (strlen($_POST['nome']) < 6) {
        $errors['nome'] = 'Digite o nome do produto com no mínimo de 6 letras';
    } else {
        $nome = $_POST['nome'];
    };

    // Chegando preco
    if((!empty($_POST['preco'])) && (!filter_var($_POST['preco'], FILTER_VALIDATE_FLOAT))) {
        $errors['preco'] = 'O preço deve ser um número';
    } else {
        $preco = $_POST['preco'];
    };

    // Definindo descrição pós submit (para lembrar o que for preenchido)
    $descricao = $_POST['descricao'];

    // Checando imagem
    if(empty($_POST['imagem'])){
        $errors['imagem']= 'Você precisa escolher uma imagem';
    } else {
        $imagem = $_POST['imagem'];
    };

    //Verificando se há erros no form para, então, enviar
    if(array_filter($errors)){
        echo 'Corrija os erros do formulário';
    } else {
        // echo 'form é válido';
        // enviar dados para json
    };


};


?>

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

    <title>Desafio PHP</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">&lt;Desafio PHP/&gt;</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Adicionar Produto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Usuários</a>
                        </li>
                    </ul>
                    <span class="nav-item">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">Logout</a>
                            </li>
                        </ul>
                    </span>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container my-5">
            <div class="row">
                <h1 class="col-12">Adicionar Produto</h1>
            </div>

            <form action="#" method="POST" class="">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?= $nome ?>" >
                            <div class="text-danger font-weight-bold">
                                
                                    <p><?= $errors['nome'] ?></p>
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">

                            <label for="preco">Preço:</label>
                            <input type="text" name="preco" id="preco" class="form-control" placeholder="R$ 00,00" value="<?= $preco ?>">
                            <div class="text-danger font-weight-bold">
                                 <p><?= $errors['preco'] ?></p>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="descricao">Descrição:</label>
                            <textarea name="descricao" id="descricao" class="form-control" rows="8"><?= $descricao ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="custom-file altura_file mb-2">
                            <label for="imagem" class="custom-file-label">Selecione a foto</label>
                            <input type="file" name="imagem" id="imagem" class="custom-file-input" accept="image/*"><br>
                                <div class="text-danger font-weight-bold">
                                 
                                        <p><?= $errors['imagem'] ?></p>
                                 
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block">Adicionar</button>
                        </div>
                    </div>
                </div>



            </form>

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