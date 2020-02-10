<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Meu CSS -->
    <link rel="stylesheet" href="style.css">


    <title>Document</title>
</head>
<body>
    <header>
        <?php include("./includes/nav.php"); ?>
    </header>    

    <main>

        <div class="container my-5">
            <h1>Lista de Produtos</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Produto 1</td>
                        <td>Novo produto 1</td>
                        <td>R$ 15</td>
                        <td>
                            <a href="editProduto.php" role='button' class="btn btn-info" >Editar</a>
                            <a href="#" role='button' class="btn btn-danger" >Excluir</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Produto 2</td>
                        <td>Novo produto 3</td>
                        <td>R$ 25</td>
                        <td>
                            <a href="editProduto.php" role='button' class="btn btn-info" >Editar</a>
                            <a href="#" role='button' class="btn btn-danger" >Excluir</button>
                        </td>
                    </tr>
                </tbody>


            </table>


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