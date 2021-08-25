<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$codeOldProdUp=consultasSQL::clean_string($_POST['code-old-prod']);
$nameProdUp=consultasSQL::clean_string($_POST['prod-name']);
$catProdUp=consultasSQL::clean_string($_POST['prod-categoria']);
$priceProdUp=consultasSQL::clean_string($_POST['prod-price']);
$modelProdUp=consultasSQL::clean_string($_POST['prod-model']);
$ProvinciaProdUp=consultasSQL::clean_string($_POST['prod-Provincia']);
$cantidadProdUp=consultasSQL::clean_string($_POST['prod-cantidad']);
$proveProdUp=consultasSQL::clean_string($_POST['prod-codigoP']);
$EstadoProdUp=consultasSQL::clean_string($_POST['prod-estado']);
$descProdUp=consultasSQL::clean_string($_POST['prod-desc-price']);

$imgName=$_FILES['img']['name'];
$imgType=$_FILES['img']['type'];
$imgSize=$_FILES['img']['size'];
$imgMaxSize=5120;

if($imgName!=""){
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
        $imgFinalName=$codeOldProdUp.$imgEx;
        if(!move_uploaded_file($_FILES['img']['tmp_name'],"../assets/img-destinos/".$imgFinalName)){
            echo '<script>swal("ERROR", "Ha ocurrido un error al cargar la imagen", "error");</script>';
            exit();
        }
    }else{
        echo '<script>swal("ERROR", "Ha excedido el tamaño máximo de la imagen, tamaño máximo es de 5MB", "error");</script>';
        exit();
    }
  }else{
    echo '<script>swal("ERROR", "El formato de la imagen del destino es invalido, solo se admiten archivos con la extensión .jpg y .png ", "error");</script>';
    exit();
  }
}

if(consultasSQL::UpdateSQL("destino", "NombreDestino='$nameProdUp',CodigoCat='$catProdUp',Precio='$priceProdUp',Descuento='$descProdUp',Canton='$modelProdUp',Provincia='$ProvinciaProdUp',cantidad='$cantidadProdUp',CedulaProveedor='$proveProdUp',Estado='$EstadoProdUp'", "CodigoDestino='$codeOldProdUp'")){
   echo '<script>
    swal({
      title: "destino actualizado",
      text: "El destino se actualizo con éxito",
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