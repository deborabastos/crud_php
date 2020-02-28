<?php
$usuarios = json_decode(file_get_contents('../usuarios.json'), true);; // puxo a lista de usuários

if(isset($_POST['login-submit'])){
    
    $email = $_POST['login-email'];
    
    $senha = $_POST['login-senha'];

    if ((!empty($email)) && (!empty($senha))){
        foreach ($usuarios as $usuario){ // percorre toda a lista
            if($email == $usuario['email']){ //procura pelo e-mail digitado na lista                

                if (password_verify($senha, $usuario['hash'])) { // Então checa password
                    
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['nome'] = $row['nome'];
                    $_SESSION['email'] = $row['email'];
                    
                    header('location: ../indexProduto.php');
                    exit();
                } else {
                    $msg = "Senha incorreta";
                    header("location: ../index.php?msg=".$msg);
                    exit();
                };
                  
            } // fecha se e-mail digitado está cadastrado
            else { // Caso usuário não esteja cadastrado
            $msg = "E-mail não cadastrado";
            header("location: ../index.php?msg=".$msg);
            } // fecha else quando e-mail não está cadastrado
        } // fecha foreach
    
    } // fecha se e-mail e senha não estão vazios
    else { //Caso deixe e-mail ou senha vazios
        $msg = "Você deve preencher o e-mail e a senha";
        header("location: ../index.php?msg=".$msg);
        exit();
    };
}; // fecha submit isset

?>