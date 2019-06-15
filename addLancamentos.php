<?php 
include("conexao.php"); 
session_start();

$valor=$_POST["valor"];
$nome_categoria=$_POST["desc-categoria"];
$data_pag=$_POST["data-pag"];
$data_venc=$_POST["data-venc"];
$forma_pag=$_POST["forma_pagamento"];
$desc_pag=$_POST["desc-pagamento"]; 		
$situacao=$_POST["situacao"];
$id=$_POST["idfinan"];
$idUser=$_SESSION['id'];

$verifica=mysqli_query($conn, "SELECT idFINANCAS FROM movimentacoes where idFINANCAS='$id' ");
$numlin= mysqli_num_rows($verifica);
    if($numlin == 0){
        $insere=mysqli_query($conn, "INSERT INTO movimentacoes (`COD_Usuario`, `VALOR`, `CATEGORIA`,`DATA_PAGAMENTO`,`DATA_VENCIMENTO`,`FORMA_PAGAMENTO`,`SITUACAO`) 
        VALUES ('$idUser','$valor','$nome_categoria','$data_pag','$data_venc','$forma_pag','$situacao')"); 
    }else{
        $update=mysqli_query($conn," UPDATE movimentacoes  SET VALOR='$valor', CATEGORIA='$nome_categoria', DATA_PAGAMENTO='$data_pag' ,DATA_VENCIMENTO='$data_venc' ,FORMA_PAGAMENTO='$forma_pag' ,SITUACAO='$situacao' where idFINANCAS='$id'");
    }

// echo $_SESSION['id'];
// echo $idUser;
if (mysqli_query($conn, $insere,$update)) {
    header("Location: movimentacoes.php");

} else {
    header("Location: movimentacoes.php");
    echo "Error: " . $insere . "<br>" . mysqli_error($conn);
    
}

?>
