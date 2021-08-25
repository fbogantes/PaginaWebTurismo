<?php
    session_start();
    include '../library/configServer.php';
    include '../library/consulSQL.php';

    $codedestino=consultasSQL::clean_string($_POST['destino-codigo']);
    $namedestino=consultasSQL::clean_string($_POST['destino-name']);
    $pricedestino=consultasSQL::clean_string($_POST['destino-price']);
    $cantondestino=consultasSQL::clean_string($_POST['destino-canton']);
    $Provinciadestino=consultasSQL::clean_string($_POST['destino-Provincia']);
    $cantidaddestino=consultasSQL::clean_string($_POST['destino-cantidad']);
    $estadodestino=consultasSQL::clean_string($_POST['destino-estado']);
    $admindestino=consultasSQL::clean_string($_POST['admin-name']);
    $descdestino=consultasSQL::clean_string($_POST['destino-desc-price']);
    $imgName=$_FILES['img']['name'];
    $imgType=$_FILES['img']['type'];
    $imgSize=$_FILES['img']['size'];
    $imgMaxSize=5120;

    if($codedestino!="" && $namedestino!="" && $pricedestino!="" && $cantondestino!="" && $Provinciadestino!="" && $cantidaddestino!=""){
        $verificar=  ejecutarSQL::consultar("SELECT * FROM destino WHERE CodigoDestino='".$codedestino."'");
        $verificaltotal = mysqli_num_rows($verificar);
        if($verificaltotal<=0){
            if($imgType=="image/jpeg" || $imgType=="image/png"){
                if(($imgSize/1024)<=$imgMaxSize){
                    chmod('../assets/img-destinos/', 0777);
                    switch ($imgType) {
                      case 'image/jpeg':
                        $imgEx=".jpg";
                      break;
                      case 'image/png':
                        $imgEx=".png";
                      break;
                    }
                    $imgFinalName=$codedestino.$imgEx;
                    if(move_uploaded_file($_FILES['img']['tmp_name'],"../assets/img-destinos/".$imgFinalName)){
                        if(consultasSQL::InsertSQL("destino", "CodigoDestino, NombreDestino, Precio, Descuento, Canton, Provincia, cantidad, Imagen, Nombre, Estado", "'$codedestino','$namedestino','$pricedestino', '$descdestino', '$cantondestino','$Provinciadestino','$cantidaddestino','$imgFinalName','$admindestino', '$estadodestino'")){
                            echo '<script>
                                swal({
                                  title: "destino registrado",
                                  text: "El destino se añadió a la tienda con éxito",
                                  type: "success",
                                  showCancelButton: true,
                                  confirmButtonClass: "btn-danger",
                                  confirmButtonText: "Aceptar",
                                  cancelButtonText: "Cancelar",
                                  closeOnConfirm: false,
                                  closeOnCancel: false
                                  },
                                  function(isConfirm) {
                                  if (isConfirm) {
                                    location.reload();
                                  } else {
                                    location.reload();
                                  }
                                });
                            </script>';
                        }else{
                            echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
                        }   
                    }else{
                        echo '<script>swal("ERROR", "Ha ocurrido un error al cargar la imagen", "error");</script>';
                    }  
                }else{
                    echo '<script>swal("ERROR", "Ha excedido el tamaño máximo de la imagen, tamaño máximo es de 5MB", "error");</script>';
                }
            }else{
                echo '<script>swal("ERROR", "El formato de la imagen del destino es invalido, solo se admiten archivos con la extensión .jpg y .png ", "error");</script>';
            }
        }else{
            echo '<script>swal("ERROR", "El código de destino que acaba de ingresar ya está registrado en el sistema, por favor ingrese otro código de destino distinto", "error");</script>';
        }
    }else {
        echo '<script>swal("ERROR", "Los campos no deben de estar vacíos, por favor verifique e intente nuevamente", "error");</script>';
    }