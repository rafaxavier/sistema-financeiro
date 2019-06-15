<?php
include('conexao.php');
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
  session_destroy(); # Destruir todas as sessões do navegador
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  unset($_SESSION['path_avatar']);
  header('location:naoAutenticado.php');
  exit;
} else {

  // query para exibição das categorias e formas de pagamento
  $categoria = mysqli_query($conn, "select DESC_CATEGORIA from categoria ") or die("Erro");
  $forma_pg = mysqli_query($conn, "select FORMA_PAGAMENTO from forma_pagamento ") or die("Erro");

  //recebe os valores para as alterações dos categorias ou formas de pagamentos
  $parametro = filter_input(INPUT_GET, "parametro");
  //recebe o nome da categoria ser alterada ou excluida
  $del_cat= filter_input(INPUT_GET, "nomeCatDel"); 
  $nomeCatAlt= filter_input(INPUT_GET, "nomeCatAlt");
  //recebe o nome da forma de pagamento a ser alterada ou excluida  
  $nomeFormaPGalt=filter_input(INPUT_GET, "nomeFormaPGalt");
  $nomeFormaPGdel=filter_input(INPUT_GET, "nomeFormaPGdel");

// deletando categoria por nome
$Del_categoria =  mysqli_query($conn, "delete from categoria where  DESC_CATEGORIA='$del_cat' ") or die("Erro");
 // deletando forma de pagamnto por nome
$Del_FormaPG =  mysqli_query($conn, "delete from forma_pagamento where  FORMA_PAGAMENTO='$nomeFormaPGdel' ") or die("Erro");

//ALTERANDO O NOME DE UMA CATEGORIA
$Alt_categoria =  mysqli_query($conn, "update categoria set DESC_CATEGORIA='$parametro'  where  DESC_CATEGORIA='$nomeCatAlt' ") or die("Erro");
//ALTERANDO O NOME DA FORMA DE PAGAMENTO
$Alt_formaPG =  mysqli_query($conn, "update forma_pagamento set FORMA_PAGAMENTO='$parametro'  where  FORMA_PAGAMENTO='$nomeFormaPGalt' ") or die("Erro");



  ?>

  <!doctype html>
  <html lang="pt=br">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Ca$h Plus -Configurações.</title>
    <!-- link icones  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Principal CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Estilos customizados para esse template -->
    <link href="_css/dashboard.css" rel="stylesheet">
    <!-- mascara para inputs -->
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <div>

  </head>

  <body>
    <div>
      <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow  ">
            <a href="home.php"><img src="_imgs/logo.png" width="135" alt="cash plus"></a>
            <ul class="nav flex ">
              <li class="nav-item ">
                <a class="nav-link" href="home.php">
                  <i class="material-icons md-25 icon">dashboard</i>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="movimentacoes.php">
                  <i class="material-icons md-25 icon">swap_horizontal_circle </i>
                  Movimentações
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="relatorios.php">
                  <i class="material-icons md-25">assignment</i>
                  Relatórios
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="config.php">
                  <i class="material-icons md-25 icon">settings</i>
                  Configurações
                </a>
              </li>
              <li class="nav-item text-nowrap pl-5  ml-5">
                <a href="perfil.php"> "olá <?php echo $_SESSION['login']; ?> " <img src="<?php echo $_SESSION['path_avatar'];  ?>" alt="avatar" width="45"></a>
              </li>
              <li class="nav-item text-nowrap">
                <a class="nav-link" href="logout.php"> | Sair |</a>
              </li>
            </ul>
          </nav>
        </div>
    </div>
    <div align="center"><h1>CONFIGURAÇÕES </h1>
    <a href="config.php">Após alterar clique no botão para atualizar os dados</a>
</div>


    <div class="mytable box">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Categorias 
              <!-- botão chama modal pra add nova categoria -->
              <button class="btn btn-primary  material-icons md-20 pl-0 pr-0 pt-0 pb-0 mr-0" type="button" data-toggle="collapse" data-target="#a" aria-expanded="false" aria-controls="collapseExample" >
                <i class="material-icons">add</i>
              </button></th>
              <!----------------- corpo modal para add categorias -->
              <div class="collapse" id="a">
                <div class="card card-body boxtest" >
                  <form method="post" action="add.php">
                    <fieldset>
                      <legend><i class="material-icons">arrow_downward</i>INSIRA A NOVA CATEGORIA</legend>
                        <div class="form-group form-row ">
                        <input type="text"  class=" form-control" required name="parametro"><br>
                        <input type="hidden"  name="insertCat" value="categoria">
                          <input class="btn btn-success  mt-3 "   type="submit" value="INSERIR">
                        </div>  
                  </form>
                </div>
              </div> 
              <!-- final corpo -->
          </tr>
        </thead>
        <tbody>
          <?php
          
         
          // abaixo o form de exclusão
          while ($aux = mysqli_fetch_assoc($categoria)) { ?>
            <tr><td><?php echo $aux["DESC_CATEGORIA"] ?></td>
            <td><button class="btn btn-danger  material-icons md-20 pl-0 pr-0 pt-0 pb-0 mr-4" type="button" data-toggle="collapse" data-target="#a<?php echo $aux["DESC_CATEGORIA"] ?>" aria-expanded="false" aria-controls="collapseExample" >
                  <i class="material-icons">delete_forever</i>
                 </button></td>

            <td><div class="collapse" id="a<?php echo $aux["DESC_CATEGORIA"] ?>">
              <div class="card card-body boxtest" >
                <form method="get" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                    <fieldset>
                    <legend><i class="material-icons">arrow_downward</i> Quer realmente excluir a categoria  "<?php echo $aux["DESC_CATEGORIA"] ?>"</legend>
                    <div class="form-group form-row ">
            <input type="hidden"  name="nomeCatDel" value="<?php echo $aux["DESC_CATEGORIA"] ?>">
            <input class="btn btn-danger  mt-3 "   type="submit" value="Excluir">
          </div>  
          </form></td>
            <!-- // abaixo o forme de alteração -->
            <td><button class="btn btn-warning  material-icons md-20 pl-0 pr-0 pt-0 pb-0 mr-4" type="button" data-toggle="collapse" data-target="#<?php echo $aux["DESC_CATEGORIA"] ?>" aria-expanded="false" aria-controls="collapseExample" >
                      <i class="material-icons">edit</i>
                  </button></td>
          <td><div class="collapse" id="<?php echo $aux["DESC_CATEGORIA"] ?>">
            <div class="card card-body boxtest" >
            <form  method="get" action="<?php echo $_SERVER["PHP_SELF"] ?>">
            <fieldset>
            <legend><i class="material-icons">arrow_downward</i> ALTERAÇÃO no item <?php echo $aux["DESC_CATEGORIA"] ?></legend>
              <div class="form-group form-row ">
                <label >Novo Nome :</label>
                <input type="hidden"  name="nomeCatAlt" value="<?php echo $aux["DESC_CATEGORIA"] ?>">
                <input type="text"  class=" form-control" required name="parametro"><br>
                <input class="btn btn-primary mt-3  "   type="submit" value="Confirmar">
              </div>
            </div>
          </div>  
          
              </form>
           <?php }
            ?>
        </tbody>
      </table>
    </div>
    <!-- CIMA E BAIXO 33333333333333333333333333333333333333333333333333333333333333333333333 -->
    
     <!-- inicio tabela responsiva -->
   <div class="mytable box">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Formas de Pagamento 
            <!-- botão chama modal para inserir nova forma de pagamento -->
            <button class="btn btn-primary  material-icons md-20 pl-0 pr-0 pt-0 pb-0 mr-0" type="button" data-toggle="collapse" data-target="#b" aria-expanded="false" aria-controls="collapseExample" >
        <i class="material-icons">add</i>
      </button></th>
      <!-- corpo do modal de inserir nova forma de pagamento -->
      <div class="collapse" id="b">
        <div class="card card-body boxtest" >
          <form method="post" action="add.php">
            <fieldset>
              <legend><i class="material-icons">arrow_downward</i> INSIRA A NOVA FORMA DE PAGAMENTO </legend>
                <div class="form-group form-row ">
                <input type="text"  class=" form-control" required name="parametro"><br>
                  <input type="hidden"  name="insertFormPG" value="forma_pagamento">
                  <input class="btn btn-success  mt-3 "   type="submit" value="INSERIR">
                </div>  
          </form>
        </div>
      </div>
      <!-- fim fo corpo de inrerir  -->
            
          </tr>
        </thead>
        <tbody>
          <?php
          
          //pecorrendo os registros da consulta.
          while ($aux = mysqli_fetch_assoc($forma_pg)) { ?>
            <tr><td><?php echo $aux["FORMA_PAGAMENTO"] ?></td>
            <td><button class="btn btn-danger  material-icons md-20 pl-0 pr-0 pt-0 pb-0 mr-4" type="button" data-toggle="collapse" data-target="#a<?php echo $aux["FORMA_PAGAMENTO"] ?>" aria-expanded="false" aria-controls="collapseExample" >
                  <i class="material-icons">delete_forever</i>
                 </button></td>

            <td><div class="collapse" id="a<?php echo $aux["FORMA_PAGAMENTO"] ?>">
              <div class="card card-body boxtest" >
                <form method="get" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                    <fieldset>
                    <legend><i class="material-icons">arrow_downward</i> Quer realmente excluir a categoria  "<?php echo $aux["FORMA_PAGAMENTO"] ?>"</legend>
                    <div class="form-group form-row ">
            <input type="hidden"  name="nomeFormaPGdel" value="<?php echo $aux["FORMA_PAGAMENTO"] ?>">
            <input class="btn btn-danger  mt-3 "   type="submit" value="Excluir">
          </div>  
          </form></td>
            <!-- // abaixo o forme de alteração -->
            <td><button class="btn btn-warning  material-icons md-20 pl-0 pr-0 pt-0 pb-0 mr-4" type="button" data-toggle="collapse" data-target="#<?php echo $aux["FORMA_PAGAMENTO"] ?>" aria-expanded="false" aria-controls="collapseExample" >
                      <i class="material-icons">edit</i>
                  </button></td>
          <td><div class="collapse" id="<?php echo $aux["FORMA_PAGAMENTO"] ?>">
            <div class="card card-body boxtest" >
            <form  method="get" action="<?php echo $_SERVER["PHP_SELF"] ?>">
            <fieldset>
            <legend><i class="material-icons">arrow_downward</i> ALTERAÇÃO no item <?php echo $aux["FORMA_PAGAMENTO"] ?></legend>
              <div class="form-group form-row ">
                <label for="nomecat">Novo Nome :</label>
                <input type="hidden"  name="nomeFormaPGalt" value="<?php echo $aux["FORMA_PAGAMENTO"] ?>">
                <input type="text" id="nomecat" class=" form-control" required name="parametro"><br>
                <input class="btn btn-primary mt-3  "   type="submit" value="Confirmar">
              </div>
            </div>
          </div>  
          
              </form>
           <?php }
            ?>
        </tbody>
      </table>
    </div> 
    
    
    
      <!-- fim de conteudo  -->

   

    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script>
      $('.telefone').mask('(00) 0 0000-0000');
      $('.dinheiro').mask('####0.00', {
        reverse: true
      });

    </script>
  </body>

  </html>

<?php } ?>