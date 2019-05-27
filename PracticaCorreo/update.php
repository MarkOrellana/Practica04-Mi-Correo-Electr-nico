<?php
$conn=mysqli_connect('127.0.0.1','root','');
mysqli_select_db($conn,'correo');
$sql = "UPDATE usuario SET usu_cedula='$_POST[pcedula]',usu_nombres ='$_POST[pnombre]',usu_telefono='$_POST[ptelefono]',usu_correo='$_POST[pcorreo]' WHERE usu_codigo='$_POST[id]'";
if(mysqli_query($conn,$sql)){
    header("refresh:1;url=index.php");

}else{
    echo "Not Updated.";
}
?>