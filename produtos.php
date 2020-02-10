<?php

function getProdutos(){
    return json_decode(file_get_contents('produtos.json'), true);
};



function getProdutoByID($id){
    $produtos = getProdutos();
    foreach ($produtos as $produto){
        if($id == $produto['id']){
            return $produto;
        };
    };
    return null;
};

// function createProduto($data){

// };

function updateProduto($data, $id){
    $produtos = getProdutos();
    foreach ($produtos as $produto){
        if($id == $produto['id']){
            return $produto;
        };
    };
    return null;
};

// function deleteProduto($id){


// };



?>