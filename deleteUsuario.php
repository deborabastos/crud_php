<?php
// ********************************* CHAMA FUNÇÕES *********************************
require_once('usuarios.php');


// Verifica ID, se não, retorna erro
if (!isset($_POST['id'])){
    include_once('./includes/not_found.php');
    exit;
}

//Pelo ID procura o usuario com essa ID no json, retornando dados na variável $usuario
$usuarioId = $_POST['id'];
deleteUsuario($usuarioId);

header('location: createUsuario.php');


?>
