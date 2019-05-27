<?php
session_start();

include '../PracticaCorreo/coneccion.php';
$usuario=isset($_POST["correo"]) ? trim ($_POST["correo"]):null;
$contrasena=isset($_POST["contrasena"]) ? trim($_POST["contrasena"]):null;

$sql="SELECT * FROM usuario WHERE usu_correo='$usuario' and usu_password=MD5('$contrasena')";
$result=$conn->query($sql);
$row= mysqli_fetch_array($result);
if($result->num_rows > 0){
    $_SESSION['isLogged']=TRUE;
    $_SESSION['usu_codigo']= $row['usu_codigo'];
    $_SESSION['usu_rol'] = $row['usu_rol'];
    $_SESSION['usu_nombre']= $row['usu_nombres'];
    $_SESSION['usu_apellido']= $row['usu_apellidos'];
    $_SESSION['usu_correo']= $row['usu_correo'];
    if($row['usu_rol']='A'){
        header("Location: ../PracticaCorreo/index.php");
    }else{
        header("Location: ../PracticaCorreo/correosusuario.php");
    }
    

}else{
    echo "Introducir correo/contrasena correctas.";
    header("Location: ../PracticaCorreo/login.html");
    // echo "Introducir correo/contrasena correctas.";
}
$conn->close();
?>
