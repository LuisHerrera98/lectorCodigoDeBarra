<?php
include('config.php');
$Codigo = $_REQUEST['codproducto'];


//Buscando si el producto ya esta agregado con respecto a dicho usuario en session
$ConsultarProduct = ("SELECT codproducto,cantidad FROM productostemporales WHERE codproducto='".$Codigo."' ");
$jqueryProduct    = mysqli_query($con, $ConsultarProduct);
$CantProdExiste   = mysqli_num_rows($jqueryProduct);
$arrayCant = mysqli_fetch_array($jqueryProduct);


//caso 1; si ya ese producto agregado
if ($CantProdExiste >0) {
$newCantidad = ($arrayCant['cantidad'] + 1);
$UdateCantidad = ("UPDATE productostemporales SET cantidad='".$newCantidad."' WHERE codproducto='".$Codigo."' ");
$resultUpdat = mysqli_query($con, $UdateCantidad);
include('MisProductos.php');

}else{

//caso 2; si el usuario no tiene dicho producto agregado en la bd
$buscandoProd = ("SELECT * FROM productos WHERE codproducto='".$Codigo."' LIMIT 1");
$QueryProduct = mysqli_query($con, $buscandoProd);
$DataProduct = mysqli_fetch_array($QueryProduct);

$codproducto = $DataProduct['codproducto'];
$nombre      = $DataProduct['nombre'];
$cantidad    = "1";

$InsertProduct = "INSERT INTO productostemporales (codproducto, nombre, cantidad) VALUES ('$codproducto','$nombre','$cantidad')";
$result = mysqli_query($con, $InsertProduct);

include('MisProductos.php');
}
 ?>
