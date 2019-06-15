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

    $insertCat=$_POST["insertCat"];
    $insertFormPG=$_POST["insertFormPG"]; 		
    $parametro=$_POST["parametro"];

if($insertCat == "categoria" ){
    $verificaCat=mysqli_query($conn, "SELECT $parametro FROM categoria ");
    $numlin= mysqli_num_rows($verificaCat);
    if($numlin == 0){
        $insCat=mysqli_query($conn, "INSERT INTO `categoria`  (`DESC_CATEGORIA`) VALUES 
        ('$parametro')") or die("Erro");
        header("Location: config.php");
    }else{
        echo "categoria já existe";
    }
}else{
    $verificaFPG=mysqli_query($conn, "SELECT  $parametro FROM forma_pagamento ");
    $numlin= mysqli_num_rows($verificaFPG);
    if($numlin == 0){
        $insCat=mysqli_query($conn, "INSERT INTO `forma_pagamento`  (`FORMA_PAGAMENTO`) VALUES 
        ('$parametro')") or die("Erro");
    header("Location: config.php");

    }else{
        echo "forma de pagamento já existe";
    }

}

}
?>