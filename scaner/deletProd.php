<?php
include('config.php');
$idproduct      = $_POST['id'];

$sql = ("SELECT * FROM productostemporales WHERE id='".$idproduct."'");
$number = mysqli_query($con, $sql);
$CantProdExiste = mysqli_num_rows($number);
$arrayCant  = mysqli_fetch_array($number);
$dat = $arrayCant['cantidad'];

if ($dat >0) {
$newCantidad = ($arrayCant['cantidad'] - 1);
$UdateCantidad = ("UPDATE productostemporales SET cantidad='".$newCantidad."' WHERE id='".$idproduct."' ");
$resultUpdat = mysqli_query($con, $UdateCantidad);
}
if ($dat == 1) {
    $DeletProd = ("DELETE FROM productostemporales WHERE  id='" .$idproduct. "'");
    $res = mysqli_query($con, $DeletProd);
}
include('MisProductos.php');
?>
