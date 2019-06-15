
<?php
include('conexao.php');
session_start();
if((!isset($_SESSION['login'])==true) and (!isset($_SESSION['senha'])==true))
	{
    session_destroy(); # Destruir todas as sessões do navegador
    // unset ($_SESSION['COD_Usuario']);
		unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    unset ($_SESSION['path_avatar']);
		header('location:naoAutenticado.php');
		exit;

     
	}else{
    $parametro=filter_input(INPUT_GET,"parametro");
    $categoria = mysqli_query($conn,"select DESC_CATEGORIA from categoria ") or die("Erro");
    // AQUI FAZ A BUSCA DA SOMA  DE TODOS OS VALORE NOS RESPECTIVOS MESES
    $jan= mysqli_query($conn,"select sum(VALOR)  from movimentacoes  where COD_Usuario=".$_SESSION['id']."  AND DATA_PAGAMENTO  like '%".$parametro."-01%' ") or die("Erro"); 
    $fev= mysqli_query($conn,"select sum(VALOR)  from movimentacoes  where COD_Usuario=".$_SESSION['id']."  AND DATA_PAGAMENTO  like '%".$parametro."-02%' ") or die("Erro"); 
    $mar= mysqli_query($conn,"select sum(VALOR)  from movimentacoes  where COD_Usuario=".$_SESSION['id']."  AND DATA_PAGAMENTO  like '%".$parametro."-03%' ") or die("Erro"); 
    $abr= mysqli_query($conn,"select sum(VALOR)  from movimentacoes  where COD_Usuario=".$_SESSION['id']."  AND DATA_PAGAMENTO  like '%".$parametro."-04%' ") or die("Erro"); 
    $mai= mysqli_query($conn,"select sum(VALOR)  from movimentacoes  where COD_Usuario=".$_SESSION['id']."  AND DATA_PAGAMENTO  like '%".$parametro."-05%' ") or die("Erro"); 
    $jun= mysqli_query($conn,"select sum(VALOR)  from movimentacoes  where COD_Usuario=".$_SESSION['id']."  AND DATA_PAGAMENTO  like '%".$parametro."-06%' ") or die("Erro");     
    $jul= mysqli_query($conn,"select sum(VALOR)  from movimentacoes  where COD_Usuario=".$_SESSION['id']."  AND DATA_PAGAMENTO  like '%".$parametro."-07%' ") or die("Erro"); 
    $ago= mysqli_query($conn,"select sum(VALOR)  from movimentacoes  where COD_Usuario=".$_SESSION['id']."  AND DATA_PAGAMENTO  like '%".$parametro."-08%' ") or die("Erro"); 
    $set= mysqli_query($conn,"select sum(VALOR)  from movimentacoes  where COD_Usuario=".$_SESSION['id']."  AND DATA_PAGAMENTO  like '%".$parametro."-09%' ") or die("Erro"); 
    $out= mysqli_query($conn,"select sum(VALOR)  from movimentacoes  where COD_Usuario=".$_SESSION['id']."  AND DATA_PAGAMENTO  like '%".$parametro."-10%' ") or die("Erro"); 
    $nov= mysqli_query($conn,"select sum(VALOR)  from movimentacoes  where COD_Usuario=".$_SESSION['id']."  AND DATA_PAGAMENTO  like '%".$parametro."-11%' ") or die("Erro"); 
    $dez= mysqli_query($conn,"select sum(VALOR)  from movimentacoes  where COD_Usuario=".$_SESSION['id']."  AND DATA_PAGAMENTO  like '%".$parametro."-12%' ") or die("Erro"); 

    // AQUI FAZ A BUSCA DE TODAS A MOVIMENTAÇÕES NOS RESPECTIVOS ANOS DETALHADAS POR MESES 
    //PARA EXIBIR NO GRAFICO E NA TABELA
    $forma_pg = mysqli_query($conn,"select FORMA_PAGAMENTO from forma_pagamento ") or die("Erro");
      if($parametro=='2017'){
        $movimentacoes = mysqli_query($conn,"select * from movimentacoes  where  COD_Usuario=".$_SESSION['id']."  AND DATA_PAGAMENTO  >= '2017-01-01' AND DATA_PAGAMENTO  < '2018-01-01' ") or die("Erro");
        $valjan = mysqli_fetch_array($jan);
        $valfev = mysqli_fetch_array($fev);
        $valmar = mysqli_fetch_array($mar);
        $valabr = mysqli_fetch_array($abr);
        $valmai = mysqli_fetch_array($mai);
        $valjun = mysqli_fetch_array($jun);
        $valjul = mysqli_fetch_array($jul);
        $valago = mysqli_fetch_array($ago);
        $valset = mysqli_fetch_array($set);
        $valout = mysqli_fetch_array($out);
        $valnov = mysqli_fetch_array($nov);
        $valdez = mysqli_fetch_array($dez);
        
      }elseif($parametro=='2018'){
        $movimentacoes = mysqli_query($conn,"select * from movimentacoes  where COD_Usuario=".$_SESSION['id']."  AND DATA_PAGAMENTO  >= '2018-01-01' AND DATA_PAGAMENTO  < '2019-01-01' ") or die("Erro");
        $valjan = mysqli_fetch_array($resultado);
        $valjan = mysqli_fetch_array($jan);
        $valfev = mysqli_fetch_array($fev);
        $valmar = mysqli_fetch_array($mar);
        $valabr = mysqli_fetch_array($abr);
        $valmai = mysqli_fetch_array($mai);
        $valjun = mysqli_fetch_array($jun);
        $valjul = mysqli_fetch_array($jul);
        $valago = mysqli_fetch_array($ago);
        $valset = mysqli_fetch_array($set);
        $valout = mysqli_fetch_array($out);
        $valnov = mysqli_fetch_array($nov);
        $valdez = mysqli_fetch_array($dez);
        
      }elseif($parametro=='2019'){
        $movimentacoes = mysqli_query($conn,"select * from movimentacoes  where COD_Usuario=".$_SESSION['id']."  AND DATA_PAGAMENTO  >= '2019-01-01' AND DATA_PAGAMENTO  < '2020-01-01' ") or die("Erro");
        $valjan = mysqli_fetch_array($resultado);
        $valjan = mysqli_fetch_array($jan);
        $valfev = mysqli_fetch_array($fev);
        $valmar = mysqli_fetch_array($mar);
        $valabr = mysqli_fetch_array($abr);
        $valmai = mysqli_fetch_array($mai);
        $valjun = mysqli_fetch_array($jun);
        $valjul = mysqli_fetch_array($jul);
        $valago = mysqli_fetch_array($ago);
        $valset = mysqli_fetch_array($set);
        $valout = mysqli_fetch_array($out);
        $valnov = mysqli_fetch_array($nov);
        $valdez = mysqli_fetch_array($dez);

      }elseif($parametro=='2020'){
        $movimentacoes = mysqli_query($conn,"select * from movimentacoes  where COD_Usuario=".$_SESSION['id']."  AND DATA_PAGAMENTO  >= '2020-01-01' AND DATA_PAGAMENTO  < '2021-01-01'") or die("Erro");
        $valjan = mysqli_fetch_array($jan);
        $valfev = mysqli_fetch_array($fev);
        $valmar = mysqli_fetch_array($mar);
        $valabr = mysqli_fetch_array($abr);
        $valmai = mysqli_fetch_array($mai);
        $valjun = mysqli_fetch_array($jun);
        $valjul = mysqli_fetch_array($jul);
        $valago = mysqli_fetch_array($ago);
        $valset = mysqli_fetch_array($set);
        $valout = mysqli_fetch_array($out);
        $valnov = mysqli_fetch_array($nov);
        $valdez = mysqli_fetch_array($dez);
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

    <title>Ca$h Plus -Dashboard.</title>
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
        <li class="nav-item text-nowrap pl-5  ml-5" >
          <a href="perfil.php"> "olá  <?php echo $_SESSION['login'] ; ?> " <img src="<?php echo $_SESSION['path_avatar'];  ?>" alt="avatar" width="45" ></a>
        </li>
        <li class="nav-item text-nowrap ">
          <a class="nav-link" href="logout.php"> | Sair |</a>
        </li>
        </ul>
    </nav> 
  </div>
  </div>
  <!-- aqui termina o navbar -->

            
        
    <div  align="center"> 
      <h1>Dashboard</h1>
      <h5>Despesas mensais</h5>
      <main role="main" class="col-md-0 ml-0 sm-0  col-lg-0 px-0 mt-0 ">
        <canvas id="myChart" style="max-width: 700px;"></canvas>
          <!-- botão de filtros de exibição -->
          <div class="ml-5 mt-0  " >
            <form method="get" action="<?php echo $_SERVER['PHP_SELF']?>">
              <input type="hidden"  name="parametro" value="2017">
              <input class="mr-3 mt-2 mb-5 btn btn-lg btn-outline-secondary btn-success"  id="botao"  type="submit" value="2017">
            </form>
            <form method="get" action="<?php echo $_SERVER['PHP_SELF']?>">
              <input type="hidden"  name="parametro" value="2018">
              <input class=" mr-3 mt-2 mb-5  btn btn-lg btn-outline-secondary btn-success" id="botao"  type="submit" value="2018">
            </form>
            <form method="get" action="<?php echo $_SERVER['PHP_SELF']?>">
              <input type="hidden"  name="parametro" value="2019">
              <input class="mr-3 mt-2 mb-5  btn btn-lg btn-outline-secondary btn-success" id="botao"  type="submit" value="2019">
            </form>
            <form method="get" action="<?php echo $_SERVER['PHP_SELF']?>">
              <input type="hidden"  name="parametro" value="2020">
              <input class="mr-3 mt-2 mb-5 pl-4 pr-4 btn btn-lg btn-outline-secondary btn-success" id="botao"  type="submit" value="2020">
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
              while ($aux = mysqli_fetch_assoc($movimentacoes)){
							  echo "<tr><td>".$aux["idFINANCAS"]."</td>"; 
							  echo "<td>R$".$aux["VALOR"]."</td>"; 
							  echo "<td>".$aux["CATEGORIA"]."</td>"; 
							  echo "<td>".date('d-m-Y',  strtotime($aux["DATA_PAGAMENTO"]))."</td>"; 
							  echo "<td>".date('d-m-Y',  strtotime($aux["DATA_VENCIMENTO"]))."</td>";
							  echo "<td>".$aux["FORMA_PAGAMENTO"]."</td>";
                echo "<td>".$aux["SITUACAO"]."</td></tr>";

              
              }
							 //mysqli_close($conn);	
		   				?>
              </tbody>
            </table>
        </div>
      </main>
    </div>

    <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Ícones -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Gráficos -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [ "jan", "fev", "mar","abr","mai","jun", "jul", "ago","set","out","nov","dez"],
      datasets: [{
        label: ' #R$',
        data: ["<?php echo $valjan['sum(VALOR)'] ;?>","<?php echo $valfev['sum(VALOR)'] ;?>","<?php echo $valmar['sum(VALOR)'] ;?>","<?php echo $valabr['sum(VALOR)'] ;?>",
        "<?php echo $valmai['sum(VALOR)'] ;?>","<?php echo $valjun['sum(VALOR)'] ;?>","<?php echo $valjul['sum(VALOR)'] ;?>","<?php echo $valago['sum(VALOR)'] ;?>",
        "<?php echo $valset['sum(VALOR)'] ;?>","<?php echo $valout['sum(VALOR)'] ;?>","<?php echo $valnov['sum(VALOR)'] ;?>","<?php echo $valdez['sum(VALOR)'] ;?>"],
        backgroundColor: [
          'rgba(236, 10,2 ,0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgb(8, 97, 13, 0.2)',
          'rgba(255, 238, 7, 0.2)',
          'rgba(44, 250, 2, 0.2)',
          'rgba(2, 103, 255, 0.2)',
          'rgba(99, 45, 81, 0.2)',
          'rgba(255, 14, 175, 0.2)',
          'rgb(255, 123, 15, 0.2)',
          'rgba(90, 192, 192, 0.2)'
        ],
        borderColor: [
          'rgba(236, 10, 2)',
          'rgba(75, 192, 192)',
          'rgba(153, 102, 255)',
          'rgba(255, 159, 64)',
          'rgb(8, 97, 13)',
          'rgba(255, 238, 7)',
          'rgba(44, 250, 2)',
          'rgba(2, 103, 255)',
          'rgba(99, 45, 81)',
          'rgba(255, 14, 175)',
          'rgb(255, 123, 15)',
          'rgba(90, 192, 192)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });

</script>
  </body>
</html>

<?php } ?>
