<?php


// Pega a lista de produtos no arquivo produtos.json e transforma em php
function getProdutos(){
    return json_decode(file_get_contents('produtos.json'), true);
};


// Pega um produto na lista de produtos pela id
function getProdutoByID($id){ 
    $produtos = getProdutos(); // pega toda a lista de produtos
    foreach ($produtos as $produto){ // percorre toda a lista de produtos
        if($id == $produto['id']){ // seleciona o produto que tem id igual àquela passada em parâmetro
            return $produto; // retorna o produto selecionado
        };
    };
    return null; // se não encontrar, retorna null
};


// Produta na lista um produto pela ID. Atualiza os dados (update) e grava de volta no produtos.json
function updateProduto($data, $id){
    
    $updateProduto = [];

    $produtos = getProdutos(); // pega toda a lista de produtos
    foreach ($produtos as $i => $produto){ // percorre toda a lista de produtos
        if($id == $produto['id']){ // seleciona o produto que tem id igual àquela passada em parâmetro
            $produtos[$i] = $updateProduto = array_merge($produto, $data); // atualiza os dados do array produto via merge (mantém os dados que não foram alterados)
            
        };
    };

    file_put_contents('produtos.json', json_encode($produtos, JSON_PRETTY_PRINT)); // grava no arquivo produtos.json

    return $updateProduto;
};



// function createProduto($data){

// };



// function deleteProduto($id){


// };



?>