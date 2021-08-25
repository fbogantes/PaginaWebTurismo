
<p class="lead">
	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum voluptates, corporis nisi dolores cumque obcaecati perferendis, quisquam, ipsa commodi labore molestias dolor itaque nam cupiditate totam, ea dicta? Sit, asperiores?
</p>
<ul class="breadcrumb" style="margin-bottom: 5px;">
    <li>
        <a href="configAdmin.php?view=destino">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Nuevo destino
        </a>
    </li>
    <li>
        <a href="configAdmin.php?view=destinolist"><i class="fa fa-list-ol" aria-hidden="true"></i> &nbsp; destinos en tienda</a>
    </li>
</ul>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
            <br><br>
            <div class="panel panel-info">
              <div class="panel-heading text-center"><h4>destinos en tienda</h4></div>
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                      <thead class="">
                          <tr>
                          	  <th class="text-center">#</th>
                              <th class="text-center">Código</th>
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Precio</th>
                              <th class="text-center">Canton</th>
                              <th class="text-center">Provincia</th>
                              <th class="text-center">cantidad</th>
                              <th class="text-center">Estado</th>
                              <th class="text-center">Actualizar</th>
                              <th class="text-center">Eliminar</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                        	$mysqli = mysqli_connect(SERVER, USER, PASS, BD);
							mysqli_set_charset($mysqli, "utf8");

							$pagina = isset($_GET['pag']) ? (int)$_GET['pag'] : 1;
							$regpagina = 30;
							$inicio = ($pagina > 1) ? (($pagina * $regpagina) - $regpagina) : 0;

							$destinos=mysqli_query($mysqli,"SELECT SQL_CALC_FOUND_ROWS * FROM destino LIMIT $inicio, $regpagina");

							$totalregistros = mysqli_query($mysqli,"SELECT FOUND_ROWS()");
							$totalregistros = mysqli_fetch_array($totalregistros, MYSQLI_ASSOC);

							$numeropaginas = ceil($totalregistros["FOUND_ROWS()"]/$regpagina);

							$cr=$inicio+1;
                            while($prod=mysqli_fetch_array($destinos, MYSQLI_ASSOC)){
                        ?>
                        <tr>
                        	<td class="text-center"><?php echo $cr; ?></td>
                        	<td class="text-center"><?php echo $prod['CodigoDestino']; ?></td>
                        	<td class="text-center"><?php echo $prod['NombreDestino']; ?></td>
                        	<td class="text-center"><?php echo $prod['Precio']; ?></td>
                        	<td class="text-center"><?php echo $prod['Canton']; ?></td>
                        	<td class="text-center"><?php echo $prod['Provincia']; ?></td>
                        	<td class="text-center"><?php echo $prod['cantidad']; ?></td>
                        	<td class="text-center">
                        		<?php echo $prod['Estado']; ?>
                        	</td>
                        	<td class="text-center">
                        		<a href="configAdmin.php?view=destinoinfo&code=<?php echo $prod['CodigoDestino']; ?>" class="btn btn-raised btn-xs btn-success">Actualizar</a>
                        	</td>
                        	<td class="text-center">
                        		<form action="process/deldestino.php" method="POST" class="FormCatElec" data-form="delete">
                        			<input type="hidden" name="prod-code" value="<?php echo $prod['CodigoDestino']; ?>">
                        			<button type="submit" class="btn btn-raised btn-xs btn-danger">Eliminar</button>	
                        		</form>
                        	</td>
                        </tr>
                        <?php 
                        	$cr++;
                        	}
                        ?>
                      </tbody>
                  </table>
                </div>
                <?php if($numeropaginas>=1): ?>
              	<div class="text-center">
                  <ul class="pagination">
                    <?php if($pagina == 1): ?>
                        <li class="disabled">
                            <a>
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="configAdmin.php?view=destinolist&pag=<?php echo $pagina-1; ?>">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>


                    <?php
                        for($i=1; $i <= $numeropaginas; $i++ ){
                            if($pagina == $i){
                                echo '<li class="active"><a href="configAdmin.php?view=destinolist&pag='.$i.'">'.$i.'</a></li>';
                            }else{
                                echo '<li><a href="configAdmin.php?view=destinolist&pag='.$i.'">'.$i.'</a></li>';
                            }
                        }
                    ?>
                    

                    <?php if($pagina == $numeropaginas): ?>
                        <li class="disabled">
                            <a>
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="configAdmin.php?view=destinolist&pag=<?php echo $pagina+1; ?>">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>
                  </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>
	</div>
</div>