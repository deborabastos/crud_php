<?php
session_start();

// ********************************* CHAMA FUNCÇÕES *********************************
require('./includes/usuarios.inc.php');

// Array com lista de todos os produtos
$usuarios = getUsuarios();



// ****************************** VALIDAÇAO ****************************** 

// Para que não dê erro em lembrar os dados digitados após a primeira submissão, dizemos que a variável é vazia até que seja definido algo
$nome = $email = $senha = $confirmaSenha = '';

// Definindo array de erros
$errors = array('nome' => '','email' => '', 'senha' => '', 'confirmaSenha' => '');

// Executar apenas após o SUBMIT
if(isset($_POST['signup-submit'])){

    // Checando nome
    if(empty($_POST['nome'])){
        $errors['nome'] = 'Você precisa digitar o seu nome';

    } elseif (strlen($_POST['nome']) < 6) {
        $errors['nome'] = 'O seu nome deve ter no mínimo 6 letras';
    } else {
        $nome = $_POST['nome'];
    };

    // Checando e-mail
    if((empty($_POST['email'])) || (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
        $errors['email'] = 'Digite um e-mail válido';
    } else {
        $email = $_POST['email'];
    };

    // Checando senha
    if( (empty($_POST['senha'])) || (strlen($_POST['senha']) < 6)){
        $errors['senha']= 'Sua senha deve ter no mínimo 6 caracteres';
    } else {
        $hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    };

    // Checando confirmação de senha
    if(($_POST['confirmaSenha']) !== ($_POST['senha'])){
        $errors['confirmaSenha'] = 'Sua senha não confere';
    }

};

// ****************************** CRIA USUÁRIO ****************************** 
//Verificando se há erros no form para, então, enviar
if(isset($_POST['signup-submit'])){ // faz a rotina a seguir apenas após ter sido precionado o botão submit
    if(!array_filter($errors)){ // Se não tiver erro, continua a rotina       
        
       // Verifica se e-mail já está cadastrado
       foreach ($usuarios as $usuario){ // percorre toda a lista de usuarios  
            if($email == $usuario['email']){ // verifica se existe e-mail na lista
                $msg = "Este e-mail já está cadastrado!"; // define mensagem de que email já foi cadastrado. ATENÇÃO, SE MUDAR FRASE AQUI, TEM QUE MUDAR NA CONDIÇÃO DO PRÓXIMO IF!!! 
                header("location: createUsuario.php?msg=".$msg);                
            };
        }; //fecha foreach 

        if(file_exists('usuarios.json') && ($msg !== "Este e-mail já está cadastrado!")){ // continua somente se email não estiver cadastrado
                $json_dados_existentes = file_get_contents('usuarios.json'); //pega os dados existentes no json e coloca em um array
                $php_dados_existentes = json_decode($json_dados_existentes, true); // transforma os dados do array em dados php via json_decode

                // Pega o último ítem do array para extrair o ID e somar 1
                $ultimo_item = end($php_dados_existentes);
                $ultimo_id = $ultimo_item['id'];
                
                // captura dados entrados no formulário
                $novos_dados = array( 
                    'id' => ++$ultimo_id,
                    'nome' => $_POST['nome'],
                    'email' => $_POST['email'],
                    'hash' => $hash,
                );

                $php_dados_existentes[] = $novos_dados;   // junta os dados do formulário no array de dados existentes
                $json_usuarios = json_encode($php_dados_existentes, JSON_PRETTY_PRINT); // transforma o array com todos os dados para o formato json
                
                    if(file_put_contents('usuarios.json', $json_usuarios)){ // grava os dados já em formato json no arquivo usuarios.json.
                        $msg = "Novo usuário cadastrado com sucesso";

                        header("location: createUsuario.php?msg=".$msg);
                    };
        } // fecha else de gravação de usuário
    }; // fecha se não tiver erros
}; //fecha isset





?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Meu CSS -->
    <link rel="stylesheet" href="style.css">


    <title>Criar Usuário</title>
</head>
<body>
    <header>
        <?php include("./includes/nav.php"); ?>
    </header>    


    <main>
        <div class="container my-5">
            <div class="row">
                <!-- Lista de usuários -->
                <div class="col-4 border">
                    <h1 class="mb-0">Usuário</h1><hr class="m-0">
                    <ul class="listaUs list-group-flush p-0">
                        <?php foreach ($usuarios as $usuario): ?>
                            <li class="list-group-item p-0 mt-3">
                                <div class="table">
                                    <div class="row">
                                        <div class="col-8">                                    
                                            <p><?= $usuario['nome']?></p>
                                            <p><?= $usuario['email']?></p>
                                        </div>  
                                        <div class="col-4 d-flex align-items-end flex-column">                                    
                                            <a href="editUsuario.php?id=<?= $usuario['id']?>" role='button' class="btn btn-info btn-sm mb-1" >Editar</a>
                                            <form method="POST" action="deleteUsuario.php">
                                                <input type="hidden" name="id" value="<?= $usuario['id']; ?>">
                                                <button class="btn btn-danger btn-sm">Excluir</button>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>


                <!-- Cadastro de usuários -->
                <div class="col-8">
                    <h1>Criar Usuário</h1>
                    
                    <form action="#" method="POST" class=""> 
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" id="nome" class="form-control <?php echo $errors['nome']?'is-invalid':''?> " value="<?= $nome ?>" >
                                <div class="text-danger font-weight-bold">
                                    <p><?= $errors['nome'] ?></p>                           
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="text" name="email" id="email" class="form-control <?php echo $errors['email']?'is-invalid':''?> " placeholder="" value="<?= $email ?>">
                                <div class="text-danger font-weight-bold">
                                    <p><?= $errors['email'] ?></p>                           
                                </div>
                            
                            </div>
                            
                            <div class="form-group">
                                <label for="senha" class="mb-0">Senha:</label>
                                    <small id="senha" class="form-text text-muted mt-0 mb-1">
                                        Mínimo 6 caracteres
                                    </small>
                                <input type="password" name="senha" id="senha" class="form-control <?php echo $errors['senha']?'is-invalid':''?>" placeholder="" value="">
                                <div class="text-danger font-weight-bold">
                                    <p><?= $errors['senha'] ?></p>                           
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="confirmaSenha">Confirmar senha:</label>
                                <input type="password" name="confirmaSenha" id="confirmaSenha" class="form-control <?php echo $errors['confirmaSenha']?'is-invalid':''?>" placeholder="" value="">
                                <div class="text-danger font-weight-bold">
                                    <p><?= $errors['confirmaSenha'] ?></p>                           
                                </div>                                                         
                            </div>

                            <div class="form-group">
                                <button type="submit" name="signup-submit" value="submit" class="btn btn-primary btn-block">Adicionar</button>
                            </div>
                    </form>

                    <p style="color: #016ecd; font-weight: 600;  text-align: center"><?php 
                        
                        if (!empty($_GET['msg'])){  
                            echo  $_GET['msg'];
                        };
                    
                    ?> </p>

                </div>
            </div>






        </div>
    </main>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>
</html>