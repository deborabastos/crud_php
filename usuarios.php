<?php
// Pega a lista de usuarios no arquivo usuarios.json e transforma em php
function getUsuarios(){
    return json_decode(file_get_contents('usuarios.json'), true);
};


// // Pega um usuario na lista de usuarios pela id
// function getusuarioByID($id){ 
//     $usuarios = getusuarios(); // pega toda a lista de usuarios
//     foreach ($usuarios as $usuario){ // percorre toda a lista de usuarios
//         if($id == $usuario['id']){ // seleciona o usuario que tem id igual àquela passada em parâmetro
//             return $usuario; // retorna o usuario selecionado
//         };
//     };
//     return null; // se não encontrar, retorna null
// };


// // Produta na lista um usuario pela ID. Atualiza os dados (update) e grava de volta no usuarios.json
// function updateusuario($data, $id){
    
//     $updateusuario = [];

//     $usuarios = getusuarios(); // pega toda a lista de usuarios
//     foreach ($usuarios as $i => $usuario){ // percorre toda a lista de usuarios
//         if($id == $usuario['id']){ // seleciona o usuario que tem id igual àquela passada em parâmetro
//             $usuarios[$i] = $updateusuario = array_merge($usuario, $data); // atualiza os dados do array usuario via merge (mantém os dados que não foram alterados)
            
//         };
//     };

//     file_put_contents('usuarios.json', json_encode($usuarios, JSON_PRETTY_PRINT)); // grava no arquivo usuarios.json

//     return $updateusuario;
// };



// function deleteusuario($id){
//     $usuarios = getusuarios();
//     foreach ($usuarios as $i => $usuario){ // percorre toda a lista de usuarios
//         if($id == $usuario['id']){ // seleciona o usuario que tem id igual àquela passada em parâmetro
//             array_splice($usuarios, $i,1); 
//         };
//     };
//     file_put_contents('usuarios.json', json_encode($usuarios, JSON_PRETTY_PRINT)); // grava no arquivo usuarios.json};

// };



?>