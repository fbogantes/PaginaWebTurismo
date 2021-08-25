<?php
include './library/configServer.php';
include './library/consulSQL.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>destinos</title>
    <?php include './inc/link.php'; ?>
</head>

<body id="container-page-destino">
    <?php include './inc/navbar.php'; ?>
    <section id="infodestino">
        <div class="container">
            <div class="row">
                <div class="page-header">
                    <h1>DETALLE DE destino <small class="tittles-pages-logo">ViajiTico</small></h1>
                </div>
                <?php 
                    $Codigodestino=consultasSQL::clean_string($_GET['CodigoDestino']);
                    $destinoinfo=  ejecutarSQL::consultar("SELECT destino.CodigoDestino,destino.NombreDestino,destino.Precio,destino.Descuento,destino.cantidad,destino.Imagen FROM destino WHERE CodigoDestino='".$Codigodestino."'");
                    while($fila=mysqli_fetch_array($destinoinfo, MYSQLI_ASSOC)){
                        echo '
                            <div class="col-xs-12 col-sm-6">
                                <h3 class="text-center">Información de destino</h3>
                                <br><br>
                                <h4><strong>Nombre: </strong>'.$fila['NombreDestino'].'</h4><br>
                                <h4><strong>Precio: </strong>$'.number_format(($fila['Precio']-($fila['Precio']*($fila['Descuento']/100))), 2, '.', '').'</h4><br>
                                <h4><strong>Cantidad: </strong>'.$fila['cantidad'].'</h4><br>
                                <h4><strong>Categoria: </strong>'.$fila['Nombre'].'</h4>';
                                if($fila['cantidad']>=1){
                                    if($_SESSION['nombreAdmin']!="" || $_SESSION['nombreUser']!=""){
                                        echo '<form action="process/carrito.php" method="POST" class="FormCatElec" data-form="">
                                            <input type="hidden" value="'.$fila['CodigoDestino'].'" name="codigo">
                                            <label class="text-center"><small>Agrega la cantidad de destinos que añadiras al carrito de compras (Maximo '.$fila['cantidad'].' destinos)</small></label>
                                            <div class="form-group">
                                                <input type="number" class="form-control" value="1" min="1" max="'.$fila['cantidad'].'" name="cantidad">
                                            </div>
                                            <button class="btn btn-lg btn-raised btn-success btn-block"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp; Añadir al carrito</button>
                                        </form>
                                        <div class="ResForm"></div>';
                                    }else{
                                        echo '<p class="text-center"><small>Para agregar destinos al carrito de compras debes iniciar sesion</small></p><br>';
                                        echo '<button class="btn btn-lg btn-raised btn-info btn-block" data-toggle="modal" data-target=".modal-login"><i class="fa fa-user"></i>&nbsp;&nbsp; Iniciar sesion</button>';
                                    }
                                }else{
                                    echo '<p class="text-center text-danger lead">No hay existencias de este destino</p><br>';
                                }
                                if($fila['Imagen']!="" && is_file("./assets/img-destinos/".$fila['Imagen'])){ 
                                    $imagenFile="./assets/img-destinos/".$fila['Imagen']; 
                                }else{ 
                                    $imagenFile="./assets/img-destinos/default.png"; 
                                }
                                echo '<br>
                                <a href="index.php" class="btn btn-lg btn-primary btn-raised btn-block"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Regresar</a>
                            </div>


                            <div class="col-xs-12 col-sm-6">
                                <br><br><br>
                                <img class="img-responsive" src="'.$imagenFile.'">
                            </div>';
                    }
                ?>
            </div>
        </div>
    </section>

    <?php include './inc/footer.php'; ?>

</body>

</html>