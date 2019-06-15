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
  $parametro = filter_input(INPUT_GET, "parametro"); //recebe paramet via form e salva em var para  usar em query
  $idlanc = filter_input(INPUT_GET, "idlancamentos"); //  ||  o id do movimento via form e salva  em var
  $buscar=filter_input(INPUT_GET, "buscar"); 
  $data=filter_input(INPUT_GET, "data");
  // #####   query genericas    ####
  // deletando movimentaçoes por id
  $deletaridlanc =  mysqli_query($conn, "delete from movimentacoes where COD_Usuario=".$_SESSION['id']."  AND idFINANCAS='$idlanc' ") or die("Erro");
 

  $categoria = mysqli_query($conn, "select DESC_CATEGORIA from categoria ") or die("Erro");
  $forma_pg = mysqli_query($conn, "select FORMA_PAGAMENTO from forma_pagamento ") or die("Erro");
  if ($parametro == 'quinze') {
    $movimentacoes = mysqli_query($conn, "select * from movimentacoes WHERE COD_Usuario=".$_SESSION['id']."  order by idFINANCAS desc limit 15 ") or die("Erro");
  } elseif ($parametro == 'trinta') {
    $movimentacoes = mysqli_query($conn, "select * from movimentacoes WHERE COD_Usuario=".$_SESSION['id']."  order by idFINANCAS desc limit 30 ") or die("Erro");
  } elseif ($parametro == 'pesquisar') {
    $movimentacoes = mysqli_query($conn, "select * from movimentacoes  WHERE COD_Usuario=".$_SESSION['id']." and  CATEGORIA='$buscar'  ") or die("Erro");
  }elseif ($parametro == 'data') {
    $movimentacoes = mysqli_query($conn, "select * from movimentacoes  WHERE COD_Usuario=".$_SESSION['id']." and  DATA_PAGAMENTO='$data'  ") or die("Erro");
  }else {
    $movimentacoes = mysqli_query($conn, "select * from movimentacoes WHERE COD_Usuario=".$_SESSION['id']."  order by idFINANCAS desc ") or die("Erro");
  }

  ?>

  <!doctype html>
  <html lang="pt=br">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Ca$h Plus -Movimentações.</title>
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


    <!-- Modal -->
    <div class="modal " id="myModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Novo Lançamento</h4>
          </div>
          <!-- inicio corpo modal add lançamentos -->
          <div class="modal-body">
            <form action="addLancamentos.php" method="POST">
              <label for="dinheiro">VALOR:</label>
              <input type="text" id="dinheiro" class="dinheiro form-control" name="valor" placeholder="R$0,00"><br>
              <hr>
              <label for="sel1">CATEGORIAS:</label>
              <select class="form-control" id="sel1" name="desc-categoria">
                <?php
                while ($aux = mysqli_fetch_assoc($categoria)) {
                  echo "<option value" . $aux['DESC_CATEGORIA'] . ">" . $aux['DESC_CATEGORIA'] . "</option>";
                }
                ?>
              </select><br>
              <hr>
              <label for="sel2">SITUAÇÃO:</label>
              <select class="form-control" id="sel2" name="situacao">
                <option value="npago">À PAGAR</option>
                <option value="pago">PAGO</option>
              </select><br><br>
              <label>DATA DE PAGAMENTO:</label>
              <input type="date" id="data" class="data form-control" name="data-pag" placeholder="Pagamento"><br>
              <label>DATA DE VENCIMENTO:</label>
              <input type="date" id="data" class="data form-control" name="data-venc" placeholder="Vencimento"><br>
              <label for="sel3">FORMAS DE PAGAMENTO:</label>
              <select class="form-control" id="sel3" name="forma_pagamento">
                <?php
                while ($aux = mysqli_fetch_assoc($forma_pg)) {
                  echo "<option value" . $aux['FORMA_PAGAMENTO'] . ">" . $aux['FORMA_PAGAMENTO'] . "</option>";
                }
                ?>
              </select><br>
              <hr>
              <button class="btn btn-lg btn-success btn-block" type="submit">ADICIONAR</button>
            </form>
          </div>
          <!-- fim corpo modal add lançamentos -->
        </div>
      </div>
    </div>


    <!-- botão do modal de novo lançamento -->

    <h1 align="center">Movimentações</h1>
    <div>
      <!--botão para modal de adição de novo lançamento  -->
      <div class=" mr-5 ml-5 ">
        <button type="button" class="btn btn-sm btn-outline-secondary modal-content " data-toggle="modal" data-target="#myModal">+ Novo Lançamento</button>
      </div>
    </div>



    <!-- botão de filtros de exibição -->
    <div class="ml-5 mt-2  ">
      <form method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input type="hidden" name="parametro" value="quinze">
        <input class="mr-1 mt-5 mb-2 btn btn-sm btn-outline-secondary btn-success" id="botao" type="submit" value="15 últimos">
      </form>
      <form method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input type="hidden" name="parametro" value="trinta">
        <input class=" mr-1 mt-5 mb-2  btn btn-sm btn-outline-secondary btn-success" id="botao" type="submit" value="30 últimos">
      </form>
      <form method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input type="hidden" name="parametro" value="todos">
        <input class="mr-1 mt-5 mb-2 pl-4 pr-5 btn btn-sm btn-outline-secondary btn-success" id="botao" type="submit" value="Todos">
      </form>
    </div>
    <div class="mt-5">
      <form  method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <div class="pesquisa" >
        <input type="hidden" name="parametro" value="pesquisar">
        <input class=" mr-0 ml-0 mt-1 mb-0  btn btn-sm  btn-success" id="botao" type="submit" value="pesquisar">
      </div>
      <div class="pesquisa" >
        <input class="form-control" type="text" placeholder="Pesquise por categoria" name="buscar" >
      </div >
      </form>
      <!-- filtrar por data -->
      <div class="mt-5">
      <form  method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <div class="pesquisa" >
        <input type="hidden" name="parametro" value="data">
        <input class=" mr-0 ml-0 mt-1 mb-0  btn btn-sm  btn-success" id="botao" type="submit" value="pesquisar">
      </div>
      <div class="pesquisa" >
        <input class="form-control" type="date" name="data" >
      </div >
      
      </form>
    </div>
    
    <!-- inicio tabela responsiva -->
    <div class="mytable">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>ID</th>
            <th>VALOR</th>
            <th>CATEGORIA</th>
            <th>DATA PG</th>
            <th>DATA VENC</th>
            <th>FORMA PG</th>
            <th>SITUAÇÃO</th>
          </tr>
        </thead>
        <tbody>
          <?php
          //pecorrendo os registros da consulta.
          while ($aux = mysqli_fetch_assoc($movimentacoes)) {
            echo "<tr><td>" . $aux["idFINANCAS"] . "</td>";
            echo "<td>R$" . $aux["VALOR"] . "</td>";
            echo "<td>" . $aux["CATEGORIA"] . "</td>";
            echo "<td>" .date('d-m-Y',  strtotime($aux["DATA_PAGAMENTO"])). "</td>";
            echo "<td>" .date('d-m-Y',  strtotime($aux["DATA_VENCIMENTO"])). "</td>";
            echo "<td>" . $aux["FORMA_PAGAMENTO"] . "</td>";
            echo "<td>" . $aux["SITUACAO"] . "</td>";
            echo "<td><form method='get' action=";
            echo $_SERVER['PHP_SELF'] . ">";
            echo "<input type='hidden'  name='idlancamentos' value='" . $aux["idFINANCAS"] . "'>";
            echo "<input class='btn btn-danger  material-icons md-20 pl-0 pr-0 pt-0 pb-0 '   type='submit' value='delete_forever'>";
            echo "</form></td>";
            echo "<td><button class='btn btn-warning  material-icons md-20 pl-0 pr-0 pt-0 pb-0 mr-4' type='button' data-toggle='collapse' data-target='#" . $aux["idFINANCAS"] . "' aria-expanded='false' aria-controls='collapseExample' >
                      <i class='material-icons'>edit</i>
                  </button></td>
                  <td><div class='collapse' id='". $aux["idFINANCAS"] ."'>
            <div class='card card-body boxtest' >
            <form  method='post' action='addLancamentos.php'>
            <fieldset>
            <legend><i class='material-icons'>arrow_downward</i> ALTERAÇÃO no item". $aux["idFINANCAS"] ."</legend>
              <div class='form-group form-row '>
                <label for='dinheiro'>VALOR:</label>
                <input type='text' id='dinheiro' class='dinheiro form-control' name='valor' placeholder='R$0,00'><br>
              </div>
              <div class='form-group '>
                <label>CATEGORIAS:</label>
                <select class='form-control' name='desc-categoria'>";
                  $categoria = mysqli_query($conn, "select DESC_CATEGORIA from categoria ") or die("Erro");
                  while ($aux1 = mysqli_fetch_assoc($categoria)){
                    echo "<option value'.$aux1[DESC_CATEGORIA].'>$aux1[DESC_CATEGORIA]</option>";
                  }

                echo "</select><br><hr>
              </div>
              <div class='form-group '>
                <label >SITUAÇÃO:</label>
                <select class='form-control' name='situacao'>
                  <option value='npago'>À PAGAR</option>
                  <option value='pago'>PAGO</option>
                </select><br>
              </div>";

              echo "<div class='form-group '>
              <label>DATA DE PAGAMENTO:</label>
              <input type='hidden'  name='idfinan' value='"; echo $aux["idFINANCAS"]."'>";
              echo "<br>
                <input type='date' id='data' class='data form-control' name='data-pag' placeholder='Pagamento'><br>
              </div>
              <div class='form-group '>
                <label>DATA DE VENCIMENTO:</label>
                <input type='date' id='data' class='data form-control' name='data-venc' placeholder='Vencimento'><br>
              </div>
              <div class='form-group '>
                <label >FORMAS DE PAGAMENTO:</label>
                <select class='form-control'  name='forma_pagamento'>";
                $forma_pg = mysqli_query($conn, "select FORMA_PAGAMENTO from forma_pagamento ") or die("Erro");
                  while ($aux = mysqli_fetch_assoc($forma_pg)) {
                    echo "<option value". $aux['FORMA_PAGAMENTO'] .">". $aux['FORMA_PAGAMENTO'] ."</option>";
                  }

                echo "</select><br>
              </div>
              <button class='btn btn-lg btn-primary ' type='submit'>Salvar</button>
            </form>
                </fieldset></td></tr>
            <!-- fim do form de alteraçao -->";
            }
            ?>
        </tbody>
      </table>
    </div> 
    <!-- fim da tabela -->

    <!-- </main> -->
    </div>
    </div>

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