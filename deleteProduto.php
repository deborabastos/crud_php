<?php
// ********************************* CHAMA FUNÇÕES *********************************
require_once('produtos.php');


// Verifica se foi passado parâmetro ID, se não, retorna erro
if (!isset($_POST['id'])){
    include_once('./includes/not_found.php');
    exit;
}

//Pelo ID procura o produto com essa ID no json, retornando dados na variável $produto
$produtoId = $_POST['id'];
deleteProduto($produtoId);

header('location: indexProduto.php');


?>