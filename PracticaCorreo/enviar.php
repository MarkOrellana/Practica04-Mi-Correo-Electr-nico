<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Nuevo Usuario</title>
    <link href="../PracticaCorreo/css/nav1.css" rel="stylesheet" />

    <style type="text/css" rel="stylesheet">
    .error{
        color:red;
    }
    </style>
</head>
<body>
    <?php
    include '../PracticaCorreo/coneccion.php';
$asunto=isset($_POST["asunto"]) ? trim($_POST["asunto"]):null;
$mensaje=isset($_POST["mensaje"]) ? mb_strtoupper(trim($_POST["mensaje"]),'UTF-8'):null;
$remi=isset($_POST["remitente"]) ? trim($_POST["remitente"]):null;
$desti=isset($_POST["destino"]) ? trim($_POST["destino"]):null;
// $contrasena=isset($_POST["contrasena"]) ? trim($_POST["contrasena"]):null;
$sql="INSERT INTO mensaje VALUES(0,null,'$asunto','$mensaje','$remi','$desti','N')";
if($conn->query($sql)==TRUE){
    echo "<p>Se ha creado los datos correctamente.</p>";
}else{
    if($conn->errno==1062){
        echo"<p class='error'>La persona remitente $cedula ya envio un mensaje.</p>";

    }else{
        echo"<p class='error'>Error:".msqli_error($conn)."</p>";

    }
}
$conn->close();
echo"<a href='../PracticaCorreo/crear_usuario.html'>Regresar</a>";
?>
 <div text-align:center;>
<footer class="footer">
        <p>&#8226; Mark Daniel Orellana Carpio &#8226; Universidad Politecnica Salesiana</p>
        <p>Email: <a href="markore2013@gmail.com">markore2013@gmail.com</a></p>
        <a href="tel:+0989884540">0989884540</a>
        <p>&copy; Todos los derechos reservados.</p>
    </footer>
</div>
    </body>
</html>
<?php
$destino=$_POST["destino"];
$asunto=$_POST["asunto"];
$nombre=$_POST["nombre"];
$remi=$_POST["remitente"];
$telefono=$_POST["telefono"];
$mensaje=$_POST["mensaje"];
$contenido="Nombre:".$nombre."\nCorreo:".$correo."\nTelefono:".$telefono."\nMensaje:".$mensaje;
mail($destino,$asunto,$contenido);
header("Location:../PracticaCorreo/index.php");
echo $contenido;
?>
