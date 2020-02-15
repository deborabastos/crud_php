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
    foreach ($produtos as $i => $produto){
        if($id == $produto['id']){
            $produtos[$i] = array_merge($produto, $data);
        };
    };

    file_put_contents('produtos.json', json_encode($produtos));
};

// function deleteProduto($id){


// };



?>