<?php
    session_start();
    
    if(isset($_SESSION["nomeUsuario"])) {

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Constructor - Compre online </title>
        <meta charset="utf-8">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style/estilo.css">
    </head>

    <body>

        <!-- MENU -->

        <header>
        <nav class="navbar navbar-expand-lg" id="nav">
                <div class="container-fluid">
                    
                    <a class="navbar-brand" href="index.php" id="name-nav"> <img src="img/logo.png" alt="Logo da Constructor" class="logo"></a>

                    <button id="botao" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bi bi-list"></i>
                    </button>
    
                    <div class="collapse navbar-collapse justify-content-end " id="navbar">
    
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php"> HOME </a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link" href="lista-itens.php"> PRODUTOS </a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link" href="perfil.php"> PERFIL </a>
                            </li>
                            
                            <li class="nav-item">
                                <?php
                                    if(!isset($_SESSION['emailUsuario'])) {
                                        echo "<a class='nav-link' href='login.php'> LOGIN </a>";
                                    } 
                                ?>
                            </li>
                            
                            <li class="nav-item" >  
                                <?php
                                    if (isset($_SESSION['emailUsuario'])){
                                        echo "<a class='nav-link' href='desconectar.php'> LOGOUT </a>";
                                    }
                                ?> 
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
    
            <div class="container-fluid">
                <div class="row">

                    <div class="col-4 col-md categorias-box">
                        <p> Tintas <i class="bi bi-paint-bucket"></i></p>
                    </div>
    
                    <div class="col-4 col-md categorias-box">
                        <p> Iluminação <i class="bi bi-lightbulb"></i> </p>
                    </div>
    
                    <div class="col-4 col-md categorias-box">
                        <p> Ferramentas <i class="bi bi-wrench"></i> </p>
                    </div>
    
                    <div class="col-6 col-md categorias-box">
                        <p> Construção <i class="bi bi-bricks"></i> </p>
                    </div>
    
                    <div class="col-6 col-md categorias-box">
                        <p> Decoração <i class="bi bi-flower1"></i> </p>
                    </div>
                </div>

            </div>
        </header>

        <!-- BARRINHA -->
        <div class="container">
            <div class="row title">
                <div class="col-12">
                <?php

                    $email = $_SESSION['emailUsuario'];
                    include 'conexao.php';

                    $conexao = conectar();

                    $sql = "SELECT nomeUsuario, emailUsuario FROM table_usuarios WHERE emailUsuario='$email'";
                    $result = mysqli_query($conexao, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<h5> Bem-vindo, " .$row['nomeUsuario']. "! </h5>";
                        }
                    }

                    desconectar($conexao);
                ?>
                </div>
            </div>

            <div class="row title">
                <div class="col-12">
                    <h3>  PERFIL </h3>
                </div>
            </div>

            <div class="row caminho-barra">
                <div class="col-12">
                    <p><a href="index.php"> Home </a> | Perfil </p>
                </div>
            </div>
        </div>


        <?php
        if($_SESSION['emailUsuario'] == 'admin@gmail.com') {

        echo "<div class='container'>
                <div class='row'>
                    <div class='col-12 col-md-4 perfil'>
                        <h5> Perfil </h5>
                        <p> Visualize e edite suas informações pessoais </p>
                        <button  type='submit' class='btn'><a href='perfil-dadospessoais.php'> Acessar </a></button>
                    </div>

                    <div class='col-12 col-md-4 perfil'>
                        <h5> Compras </h5>
                        <p> Visualize as suas compras </p>
                        <button  type='submit' class='btn'><a href='perfil-compras.php'> Acessar </a></button>
                    </div>

                    <div class='col-12 col-md-4 perfil'>
                        <h5> Produtos </h5>
                        <p> Visualize tudo sobre os produtos </p>
                        <button  type='submit' class='btn'><a href='produtos.php'> Acessar </a></button>
                    </div>
                </div>
            </div>";
        } else {
            echo "<div class='container'>
                    <div class='row'>
                        <div class='col-12 col-md-6 perfil'>
                            <h5> Perfil </h5>
                            <p> Visualize e edite suas informações pessoais </p>
                            <button  type='submit' class='btn'><a href='perfil-dadospessoais.php'> Acessar </a></button>
                        </div>

                        <div class='col-12 col-md-6 perfil'>
                            <h5> Compras </h5>
                            <p> Visualize as suas compras </p>
                            <button  type='submit' class='btn'><a href='perfil-compras.php'> Acessar </a></button>
                        </div>
                    </div>
                </div>";
        }
        ?>
     
        <!-- RODAPÉ -->

        <footer>
            <div class="container-fluid" id="contact-area">
                <div class="row">
                    <div class="col-6" id="name-footer"> <img src="img/logo.png" alt="Logo da Constructor" class="logo"> </div>
                    <div class="col-6 contact-box">
                        <p><span class="contact-title"> <i class="bi bi-telephone"></i> Telefone: <br></span> (84) 99999-9999</p>
                        <p><span class="contact-title"> <i class="bi bi-envelope"></i> E-mail: <br></span> contructorcontato@gmail.com</p>
                        <p><span class="contact-title">  Desenvolvido por: <br></span> Agenilton de Holanda e Luiz Gustavo</p>
                        <a href="https://www.facebook.com"> <i class="bi bi-facebook"></i> </a>
                        <a href="https://www.instagram.com"> <i class="bi bi-instagram"></i> </a>
                        <a href="https://twitter.com"> <i class="bi bi-twitter"></i> </a>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    </body>
</html>

<?php 

    } else {
        header('Location: login.php');
    }
?>