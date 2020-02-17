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

    // Checando imagem
    if(empty($_POST['imagem'])){
        $errors['imagem']= 'Você precisa escolher uma imagem';
    } else {
        $imagem = $_POST['imagem'];
    };


};

// ****************************** CRIA PRODUTO ****************************** 
//Verificando se há erros no form para, então, enviar
if(isset($_POST['submit'])){ // faz a rotina a seguir apenas após ter sido precionado o botão submit
    if(!array_filter($errors)){ // Se não tiver erro, continua a rotina       
        
        if(file_exists('produtos.json')){ // continua somente se o arquivo produtos.json existir
            $json_dados_existentes = file_get_contents('produtos.json'); //pega os dados existentes no json e coloca em um array
            $php_dados_existentes = json_decode($json_dados_existentes, true); // transforma os dados do array em dados php via json_decode
            
            $ultimo_item = end($php_dados_existentes);
            $ultimo_id = $ultimo_item['id'];
            
            $novos_dados = array( // captura dados entrados no forumlário
                'id' => ++$ultimo_id,
                'nome' => $_POST['nome'],
                'preco' => $_POST['preco'],
                'descricao' => $_POST['descricao'],
                'imagem' => $_POST['imagem']
            );
            $php_dados_existentes[] = $novos_dados;   // junta os dados do formulário no array de dados existentes
            $json_produtos = json_encode($php_dados_existentes, JSON_PRETTY_PRINT); // transforma o array com todos os dados para o formato json
            
            if(file_put_contents('produtos.json', $json_produtos)){ // grava os dados já em formato json no arquivo produtos.json.
                header('location: indexProduto.php');               // Se der certo, redireciona para o index
            };
        } 
    };
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
            <div class="row px-3">
                <h1 class="mr-auto">Adicionar Produto</h1>
                <div>
                    <input type='button' class="btn btn-primary btn-sm mt-2" value='Voltar' onclick='history.go(-1)' />
                </div>
            </div>


            <form action="#" method="POST" class="">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" id="nome" class="form-control <?php echo $errors['nome']?'is-invalid':''?> " value="<?= $nome ?>" >
                            <div class="text-danger font-weight-bold">
                                    <p><?= $errors['nome'] ?></p>                           
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">

                            <label for="preco">Preço:</label>
                            <input type="text" name="preco" id="preco" class="form-control <?php echo $errors['preco']?'is-invalid':''?>" placeholder="R$ 00,00" value="<?= $preco ?>">
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
                            <input type="file" name="imagem" id="imagem" class="custom-file-input" accept="image/*"><br>
                            <label for="imagem" class="custom-file-label">Selecione a foto</label>
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
    <script>
        // Faz com que a barra de upload de arquivo mostre o nome original do arquivo escolhido pelo usuário
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

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