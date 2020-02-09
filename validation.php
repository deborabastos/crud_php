<?php

// Captura os dados em variáveis 
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$imagem = $_POST['imagem'];


// Verifica se os dados obrigatórios foram preenchidos, caso contrário, retorna erro
    if(empty($nome)){
        $nome_error = 'Você precisa digitar o nome do produto';

    } elseif (strlen($nome)< 6) {
        $nome_error = 'Digite o nome do produto com no mínimo de 6 letras';
    };

    if(empty($imagem)){
        $imagem_error = 'Você precisa escolher uma imagem';
    }

    if((!empty($preco)) && (!filter_var($preco, FILTER_VALIDATE_FLOAT))) {
        $preco_error = 'O preço deve ser um número';
    };

// Checar se há erros






include('createProduto.php');


?>
