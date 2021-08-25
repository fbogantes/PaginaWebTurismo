<p class="lead">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, culpa quasi tempore assumenda, perferendis sunt. Quo consequatur saepe commodi maxime, sit atque veniam blanditiis molestias obcaecati rerum, consectetur odit accusamus.
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
            <div class="container-form-admin">
                <h3 class="text-primary text-center">Actualizar datos del destino</h3>
                <?php
                	$code=$_GET['code'];
                	$destino=ejecutarSQL::consultar("SELECT * FROM destino WHERE CodigoDestino='$code'");
                	$prod=mysqli_fetch_array($destino, MYSQLI_ASSOC);
                ?>
                <form action="./process/updateDestino.php" method="POST" enctype="multipart/form-data" class="FormCatElec" data-form="update">
                	<input type="hidden" name="code-old-prod" value="<?php echo $prod['CodigoDestino']; ?>">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <legend>Datos básicos</legend>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <div class="form-group label-floating">
                                <label class="control-label">Código de destino</label>
                                <input type="text" class="form-control" value="<?php echo $prod['CodigoDestino']; ?>" required maxlength="30" readonly name="prod-codigo">
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <div class="form-group label-floating">
                                <label class="control-label">Nombre de destino</label>
                                <input type="text" class="form-control" value="<?php echo $prod['NombreDestino']; ?>" required maxlength="30" name="prod-name">
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <div class="form-group label-floating">
                                <label class="control-label">Provincia</label>
                                <input type="text" class="form-control" value="<?php echo $prod['Provincia']; ?>" required name="prod-Provincia">
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <div class="form-group label-floating">
                                <label class="control-label">Canton</label>
                                <input type="text" class="form-control" value="<?php echo $prod['Canton']; ?>" required name="prod-model">
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <div class="form-group label-floating">
                                <label class="control-label">Precio</label>
                                <input type="text" class="form-control" value="<?php echo $prod['Precio']; ?>" required maxlength="20" pattern="[0-9.]{1,20}" name="prod-price">
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <div class="form-group label-floating">
                                <label class="control-label">Descuento (%)</label>
                                <input type="text" class="form-control" required maxlength="2" pattern="[0-9]{1,2}" name="prod-desc-price" value="<?php echo $prod['Descuento']; ?>">
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <div class="form-group label-floating">
                                <label class="control-label">Unidades disponibles</label>
                                <input type="text" class="form-control" value="<?php echo $prod['cantidad']; ?>" required maxlength="20" pattern="[0-9]{1,20}" name="prod-cantidad">
                              </div>
                            </div>
                            <div class="col-xs-12">
                                <legend>Categoría, proveedor y estado</legend>
                            </div>
                           
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <div class="form-group">
                                <label>Estado</label>
                                <select class="form-control" name="prod-estado">
                                	<?php
                                		if($prod['Estado']=="Activo"){
                                			echo '
                                				<option value="Activo" selected="">Activo (Actual)</option>
                                    			<option value="Desactivado">Desactivado</option>
                                			';
                                		}else{
                                			echo '
                                				<option value="Activo">Activo</option>
                                    			<option value="Desactivado" selected="">Desactivado (Actual)</option>
                                			';
                                		}
                                	?>
                                </select>
                              </div>
                            </div>
                            <div class="col-xs-12">
                                <legend>Imagen/Foto del destino</legend>
                                <p class="text-center text-primary">
                                    No es necesario actualizar la Imagen/Foto del destino, sin embargo si desea actualizarla seleccione una en el siguiente campo. Formato de imágenes admitido png y jpg. Tamaño máximo 5MB
                                </p>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                  <input type="file" name="img">
                                  <div class="input-group">
                                    <input type="text" readonly="" class="form-control" placeholder="Seleccione la imagen del destino...">
                                      <span class="input-group-btn input-group-sm">
                                        <button type="button" class="btn btn-fab btn-fab-mini">
                                          <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                        </button>
                                      </span>
                                  </div>
                                    <p class="help-block">Formato de imágenes admitido png y jpg. Tamaño máximo 5MB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <input type="hidden"  name="admin-name" value="<?php echo $_SESSION['nombreAdmin'] ?>">
                <p class="text-center"><button type="submit" class="btn btn-success btn-raised">Actualizar destino</button></p>
                </form>
            </div>
        </div>
    </div>
</div>