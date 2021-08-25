<!DOCTYPE html>
<html lang="es">
<head>
<link href="./css/galeria.css" rel="stylesheet" />
    <title>TiajiTico</title>
    <?php include './inc/link.php'; ?>
</head>

<body id="container-page-index">
    <?php include './inc/navbar.php'; ?>
    
    <section id="slider-store" class="carousel slide" data-ride="carousel" style="padding: 0;">

        <div class="carousel-inner" role="listbox">

            <div class="item active">
                <video id="crvideo">
                    <source src="video/CostaRican.mp4" type="video/mp4">
                    <source src="Video/CostaRican.mp4" type="video/ogg">
                </video>
                <form action="./search.php" method="GET">
                <div class="field" id="searchform">
                    <input type="text" id="searchterm" name="searchterm" placeholder="A dónde quieres ir?" />
                    <button type="submit" id="search">Buscar!</button>
                    </div>
                </form>    
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#1ABC9C" fill-opacity="1"
                        d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,245.3C672,256,768,256,864,234.7C960,213,1056,171,1152,165.3C1248,160,1344,192,1392,208L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>
            </div>


        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#slider-store" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#slider-store" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </section>
    <section id="new-prod-index">    
         <div class="container">
            <div class="page-header">
                <h1>Destinos <small> agregados</small></h1>
            </div>
            <div class="row">
              	<?php
                  include 'library/configServer.php';
                  include 'library/consulSQL.php';
                  $consulta= ejecutarSQL::consultar("SELECT * FROM destino WHERE Cantidad > 0 AND Estado='Activo' ORDER BY id DESC");
                  $totalDestinos = mysqli_num_rows($consulta);
                  if($totalDestinos>0){
                      while($fila=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
                ?>
                <div class="col-xs-12 col-sm-6 col-md-4">
                     <div class="thumbnail">
                       <img class="img-destino" src="assets/img-destinos/<?php if($fila['Imagen']!="" && is_file("./assets/img-destinos/".$fila['Imagen'])){ echo $fila['Imagen']; }else{ echo "default.png"; } ?>">
                       <div class="caption">
                       		<h3><?php echo $fila['Marca']; ?></h3>
                            <p><?php echo $fila['NombreDestino']; ?></p>
                            <?php if($fila['Descuento']>0): ?>
                             <p>
                             <?php
                             $pref=number_format($fila['Precio']-($fila['Precio']*($fila['Descuento']/100)), 2, '.', '');
                             echo $fila['Descuento']."% descuento: $".$pref; 
                             ?>
                             </p>
                             <?php else: ?>
                              <p>$<?php echo $fila['Precio']; ?></p>
                             <?php endif; ?>
                        <p class="text-center">
                            <a href="infoDestino.php?CodigoDestino=<?php echo $fila['CodigoDestino']; ?>" class="btn btn-primary btn-sm btn-raised btn-block"><i class="fa fa-plus"></i>&nbsp; Detalles</a>
                        </p>
                       </div>
                     </div>
                </div>     
                <?php
                     }   
                  }else{
                      echo '<h2>No hay Destinos registrados</h2>';
                  }  
              	?>  
            </div>
         </div>
    </section>
    <section id="reg-info-index">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 text-center">
                   <article style="margin-top:5%;">
                        <p><i class="fa fa-users fa-4x"></i></p>
                        <h3>Registrate</h3>
                        <p>Registrate como cliente de <span class="tittles-pages-logo">ViajiTico</span> en un sencillo formulario para poder completar tus pedidos</p>
                        <p><a href="registration.php" class="btn btn-info btn-raised btn-block">Registrarse</a></p>   
                   </article>
                </div>

                <div class="col-xs-12 col-sm-6">
                    <img src="assets/img/tv.png" alt="Smart-TV" class="img-responsive" style="width: 70%; display: block; margin: 0 auto;">
                </div>
            </div>
        </div>
    </section>
    <section id="new-prod-index">
        
        <ul class="gallery-ul">
            <li>
                <img src="https://pix10.agoda.net/geo/country/40/3_40_costa_rica_02.jpg?s=1920x" alt="Playa Manuel Antonio" loading="lazy">
            </li>
            <li>
                <img src="https://i.pinimg.com/originals/3b/25/68/3b2568f411315714f55db8019f8d8549.jpg" alt="Colibri Snowcap" loading="lazy">
            </li>
            <li>
                <img src="https://www.ballenaparadise.com/wp-content/uploads/2019/06/Cataratas-Nauyacas-768x1024.jpg" alt="Catarata Nauyaca" loading="lazy">
            </li>
            <li>
                <img src="https://la.network/wp-content/uploads/2017/01/SAN-JOSE-DE-COSTA-RICA-TEATRO-NACIONAL-DE-NOCHE-Mihai-Bogdan-Lazar-Shutterstock.com_.jpg" alt="Volcan Poas" loading="lazy">
            </li>
            <li>
                <img src="http://puravida.com/wp-content/uploads/2012/10/poas_volcano_costa_rica.jpg" alt="Volcan Poas" loading="lazy">
            </li>
            <li>
                <img src="https://www.thetinytravelogue.com/wp-content/uploads/2017/03/vargas-beachJPG-e1490657525384-1596x860.jpg" alt="Playa Cahuita" loading="lazy">
            </li>
            <li>
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/90/Bothriechis_schlegelii_%28La_Selva_Biological_Station%29.jpg" alt="Bocaraca" loading="lazy">
            </li>
            <li>
                <img src="https://imagenes.20minutos.es/files/article_amp/uploads/imagenes/2020/02/21/perezoso.jpeg" alt="Perezoso" loading="lazy">
            </li>
            <li>
                <img src="https://dsvsbigncb06y.cloudfront.net/site/diving/costa-rica/liveabaord-costa-rica-cocos-island-xxl.jpg" alt="Tiburones Martillo" loading="lazy">
            </li>
            <li></li>
        </ul>
        <br>
        <div id="reg-info-index" class="container-maps">
            <div class="mapa">
                <br>
                <label>Mapa del país más Pura Vida</label>
                <br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3396413.6873579416!2d-86.0143344994025!3d8.655902192118875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f92e56221acc925%3A0x6254f72535819a2b!2sCosta%20Rica!5e0!3m2!1sen!2sgt!4v1623908071667!5m2!1sen!2sgt" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
                <br>
                <label>Con <a href="https://www.google.com.gt/maps/place/" target="_blank">Tiquica</a></label>
                <br>
                <!--Con los parámetros que debes sustituir, imaginando que es php ya que no especificas, quedaría así:-->
                <a href="https://www.google.com.gt/maps/@<?php echo $valor1 ?>,<?php echo $valor2 ?>,15z" target="_blank">La Finca</a>
            </div>
        </div>
    </section>

    <?php include './inc/footer.php'; ?>
</body>
</html>