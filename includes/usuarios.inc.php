<?php
// Pega a lista de usuarios no arquivo usuarios.json e transforma em php
function getUsuarios(){
    return json_decode(file_get_contents('usuarios.json'), true);
};


// Pega um usuario na lista de usuarios pela id
function getUsuarioByID($id){ 
    $usuarios = getUsuarios(); // pega toda a lista de usuarios
    foreach ($usuarios as $usuario){ // percorre toda a lista de usuarios
        if($id == $usuario['id']){ // seleciona o usuario que tem id igual àquela passada em parâmetro
            return $usuario; // retorna o usuario selecionado
        };
    };
    return null; // se não encontrar, retorna null
};

function deleteUsuario($id){
    $usuarios = getUsuarios();
    foreach ($usuarios as $i => $usuario){ // percorre toda a lista de usuarios
        if($id == $usuario['id']){ // seleciona o usuario que tem id igual àquela passada em parâmetro
            array_splice($usuarios, $i,1); 
        };
    };
    file_put_contents('usuarios.json', json_encode($usuarios, JSON_PRETTY_PRINT)); // grava no arquivo usuarios.json};

};



?>