<?php
$conn=mysqli_connect('127.0.0.1','root','');
mysqli_select_db($conn,'correo');
$sql = "DELETE FROM usuario WHERE usu_codigo ='$_GET[id]'";
if(mysqli_query($conn,$sql)){
    header("refresh:1, url=index.php");
}else   {

    echo "Not Deleted";
}
?>