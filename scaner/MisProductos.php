<style type="text/css" media="screen">
  .delete:hover{
            cursor: pointer;
        }
</style>
<?php
include('config.php');
$MiProdcut = ("SELECT t1 . * , t2 . *
FROM productos AS t1
INNER JOIN productostemporales AS t2 ON t1.codproducto = t2.codproducto");
$mostarP = mysqli_query($con, $MiProdcut);
$Products = mysqli_num_rows($mostarP);

 ?>
    <table class="table table-bordered table-hover table-responsive" style="width: 100% !important">
        <tr>
          <th>Codigo Producto</th>
          <th>Producto</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Imagen</th>
          <th>Acción</th>
        </tr>
      <tbody>
    <?php
     while ($data = mysqli_fetch_array($mostarP)) { ?>
        <tr>
            <td><?php echo $data['codproducto']; ?></td>
            <td><?php echo $data['nombre']; ?></td>
            <td><?php echo number_format($data['precio'], 0, ",", "."); ?></td>
            <td><?php echo $data['cantidad']; ?></td>
            <td><img src="<?php echo $data['foto']; ?>" alt="" style="width: 70px; height: 60px; border: none;"></td>
            <td>
              <span class="btn-delete" id="<?php echo $data['id']; ?>">
                <img src="imgs/closed.png" alt="" style="width: 30px;" id="<?php echo $data['id']; ?>" class="delete">
              </span>
            </td>
        </tr>

    <?php } ?>
      </tbody>
    </table>

<hr id="hrs">

<?php
$SqlTotal = ("SELECT pt.codproducto, p.codproducto, SUM( p.precio * pt.cantidad ) AS TotalPagar FROM productostemporales pt, productos p WHERE  p.codproducto=pt.codproducto ");
$jqueryTotal = mysqli_query($con, $SqlTotal);
$arrayTotal = mysqli_fetch_array($jqueryTotal);
?>
<center>
<table>
    <tr>
        <th colspan="4" id="totalPrecio">
            <?php echo "Total a Pagar: <span style='color:crimson; background-color: #333; padding: 5px 15px;'>". number_format($arrayTotal['TotalPagar'], 0, ",", ".")." $ </span>"; ?>
        </th>
        <th colspan="4">
            <a href="#" style="margin-left: 150px; background-color: #333; padding: 5px 15px; color: white" class="boton"> Pagar Ahora!
            </a>
        </th>
    </tr>
</table>
</center>

<br><br>


<audio class="audio" controls style="width: 0px !important;height: 0px !important;">
   <source src="audio/beep.mp3" type="audio/mpeg">
</audio>


<script src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(".btn-delete").click(function(e){
        e.preventDefault();

        var id = $(this).attr('id');
        var dataString = 'id=' + id;
        var ruta = "deletProd.php";

        $.ajax({
          url: ruta,
          type: "POST",
          data: dataString,
          success: function(data){
            $("#resultado").html(data); // Mostrar la respuestas del script PHP.
            $(".audio")[0].play();
          }
      });
      return false;

    });
});
</script>
