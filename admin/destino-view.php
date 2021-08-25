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
        <a href="configAdmin.php?view=destinolist"><i class="fa fa-list-ol" aria-hidden="true"></i> &nbsp; destinos en la lista</a>
    </li>
</ul>

<div class="container">
	<div class="row">
        <div class="col-xs-12">
            <div class="container-form-admin">
                <h3 class="text-primary text-center">Agregar un destino</h3>
                <form action="./process/regdestino.php" method="POST" enctype="multipart/form-data" class="FormCatElec" data-form="save">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <legend>Datos básicos</legend>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <div class="form-group label-floating">
                                <label class="control-label">Código de destino</label>
                                <input type="text" class="form-control" required maxlength="30" name="destino-codigo">
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <div class="form-group label-floating">
                                <label class="control-label">Nombre de destino</label>
                                <input type="text" class="form-control" required maxlength="30" name="destino-name">
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <div class="form-group label-floating">
                                <label class="control-label">Provincia</label>
                                <input type="text" class="form-control" required name="destino-Provincia">
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <div class="form-group label-floating">
                                <label class="control-label">Canton</label>
                                <input type="text" class="form-control" required name="destino-canton">
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <div class="form-group label-floating">
                                <label class="control-label">Precio</label>
                                <input type="text" class="form-control" required maxlength="20" pattern="[0-9.]{1,20}" name="destino-price">
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <div class="form-group label-floating">
                                <label class="control-label">Descuento (%)</label>
                                <input type="text" class="form-control" required maxlength="2" pattern="[0-9]{1,2}" name="destino-desc-price" value="0">
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <div class="form-group label-floating">
                                <label class="control-label">Unidades disponibles</label>
                                <input type="text" class="form-control" required maxlength="20" pattern="[0-9]{1,20}" name="destino-cantidad">
                              </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <div class="form-group">
                                <label>Estado</label>
                                <select class="form-control" name="destino-estado">
                                    <option value="Activo" selected="">Activo</option>
                                    <option value="Desactivado">Desactivado</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-xs-12">
                                <legend>Imagen/Foto del destino</legend>
                                <p class="text-center text-primary">
                                    Seleccione una imagen/foto en el siguiente campo. Formato de imágenes admitido png y jpg. Tamaño máximo 5MB
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
                <p class="text-center"><button type="submit" class="btn btn-primary btn-raised">Agregar a la tienda</button></p>
                </form>
            </div>
        </div>     
    </div>
</div>