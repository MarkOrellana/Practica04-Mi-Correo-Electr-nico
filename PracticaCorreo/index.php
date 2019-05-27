<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
        header("Location: ../PracticaCorreo/login.html");
    }else if($_SESSION['usu_rol'] == "U"){
        header("Location: ../PracticaCorreo/correosusuario.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGISTRO</title>
    <link href="../PracticaCorreo/css/nav.css" rel="stylesheet" />

</head>
<body background="../PracticaCorreo/img/fondo01.jpg" bgcolor="FFCECB">
<header class="logo">
   <a href="#"><img src="../PracticaCorreo/img/logo2.jpg" alt="Call of duty" /></a>
   <div id="navHeader">
      <ul class="crazy">
         <li><a href="../PracticaCorreo/correos.php">Mensajes</a></li>
         <li><a href="../PracticaCorreo/index.php">Usuarios</a></li>
         <!-- <li><a href="../PracticaCorreo/mostrarCuenta.php">Mi Cuenta</a></li> -->
         <li><a href="../PracticaCorreo/cerrarseccion.php">Cerrar Sesion</a></li>
      </ul>
</div>
  </header>
<table style="width:100%">
<caption>TABLA USUARIOS</caption>
<tr>
<th>Cedula</th>
<th>Nombres</th>
<th>Telefono</th>
<th>Correo</th>
<th>Contrasena</th>
<th>Accion</th>
<th>Modificar</th>
    </tr>
    <?php
    include'../PracticaCorreo/coneccion.php';
    $sql="SELECT * FROM usuario";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
          echo "<tr><form action=update.php method=post>";
          echo "<td><input type=text name=pcedula value='".$row['usu_cedula']."'</td>";
          echo "<td><input type=text name=pnombre value='".$row['usu_nombres']."'</td>";
          echo "<td><input type=text name=ptelefono value='".$row['usu_telefono']."'</td>";
          echo "<td><input type=text name=pcorreo value='".$row['usu_correo']."'</td>";
          echo "<td><input type=text name=pcontra value='".$row['usu_password']."'</td>";
          echo "<input type=hidden name=id value='".$row['usu_codigo']."'>";
          echo "<td><a href=delete.php?id=".$row['usu_codigo'].">Eliminar</a></td>";
          echo "<td><input type=submit>";
          echo "</form></tr>";
        }
    }else{
        echo "<tr>";
    }
    $conn->close();
    ?>
</table>
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