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


};


?>

