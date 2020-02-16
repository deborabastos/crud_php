<?php

// ****************************** VALIDAÇAO ****************************** 
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

    // Checando preco
    if((!empty($_POST['preco'])) && (!filter_var($_POST['preco'], FILTER_VALIDATE_FLOAT))) {
        $errors['preco'] = 'O preço deve ser um número';
    } else {
        $preco = $_POST['preco'];
    };

    // Definindo descrição pós submit (para lembrar o que for preenchido)
    $descricao = $_POST['descricao'];


};

// ********************************* CHAMA FUNÇÕES *********************************
require_once('produtos.php');


// Verifica se foi passado parâmetro ID, se não, retorna erro
if (!isset($_GET['id'])){
    include_once('./includes/not_found.php');
    exit;
}

//Retira o id da URL (GET) e procura o produto com essa ID no json, retornando dados na variável $produto
$produtoId = $_GET['id'];
$produto = getProdutoById($produtoId);


// Verifica se existe o ID, se não, retorna erro
if (!isset($produto)){
    include_once('./includes/not_found.php');
    exit;
};

// ********************************* EDITA PRODUTO *********************************
if (isset($_POST['submit'])){ // faz a rotina a seguir apenas após ter sido precionado o botão submit
    $produto = updateProduto($_POST, $produtoId); // atualiza dos dados do array


    // Atualiza foto
    if(!empty($_FILES['imagem']['name'])) { // Se houve upload de nova foto
        //Para pegar a extensão da imagem
        $fileName = $_FILES['imagem']['name'];
        //Procura o ponto no arquivo
        $ponto = strpos($fileName, '.');
        //Pega a string após o ponto até o final
        $extensao = substr($fileName, $ponto + 1);
        
        
        move_uploaded_file($_FILES['imagem']['tmp_name'], "img/$produtoId.$extensao");

        $produto['extensao'] = $extensao;
        $produto['imagem'] = $produtoId.".".$extensao;

        updateProduto($produto, $produtoId);
      
    };


    header('location: indexProduto.php');

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

    <title>Desafio PHP</title>
</head>
<body>
    <header>
        <?php include("./includes/nav.php"); ?>
    </header>

    <main>
        <div class="container my-5">
                <h1>Editar Produto</h1>

            <form action="#" method="POST" class="" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?= $produto['nome'] ?>" >
                            <div class="text-danger font-weight-bold">
                                    <p><?= $errors['nome'] ?></p>
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">

                            <label for="preco">Preço:</label>
                            <input type="text" name="preco" id="preco" class="form-control" placeholder="R$ 00,00" value="<?= $produto['preco'] ?>">
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
                            <textarea name="descricao" id="descricao" class="form-control" rows="8"><?= $produto['descricao'] ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Mostra foto -->
                <div class="row p-3">
                    <div class="col-12 border">
                        <img src="./img/<?= $produto['imagem'] ?>" alt="" class="w-50 mx-auto d-block">
                    </div>
                </div>



                <div class="row">
                    <div class="col-12">
                        <div class="custom-file altura_file mb-2">
                            <label for="imagem" class="custom-file-label">Selecione a foto</label>
                            <input type="file" name="imagem" id="imagem" class="custom-file-input" accept="image/*"><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" name="submit" value="submit" class="btn btn-warning btn-block">Editar</button>
                        </div>
                    </div>
                </div>



            </form>

        </div>

    </main>
    <script>
    // Faz com que a barra de upload de arquivo mostre o nome original do arquivo escolhido pelo usuário
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
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