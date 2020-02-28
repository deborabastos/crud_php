<?php 
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
        
        if(file_exists('usuarios.json')){ // continua somente se o arquivo usuarios.json existir
            $json_dados_existentes = file_get_contents('usuarios.json'); //pega os dados existentes no json e coloca em um array
            $php_dados_existentes = json_decode($json_dados_existentes, true); // transforma os dados do array em dados php via json_decode
            
            $ultimo_item = end($php_dados_existentes);
            $ultimo_id = $ultimo_item['id'];
            
            $novos_dados = array( // captura dados entrados no forumlário
                'id' => ++$ultimo_id,
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'hash' => $hash,
            );
            $php_dados_existentes[] = $novos_dados;   // junta os dados do formulário no array de dados existentes
            $json_usuarios = json_encode($php_dados_existentes, JSON_PRETTY_PRINT); // transforma o array com todos os dados para o formato json
            
            if(file_put_contents('usuarios.json', $json_usuarios)){ // grava os dados já em formato json no arquivo usuarios.json.
                header('location: createUsuario.php'); 
            };

        } 
    };
};




