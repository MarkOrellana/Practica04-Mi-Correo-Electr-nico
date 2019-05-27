<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensajes</title>
    <link href="../PracticaCorreo/css/nav.css" rel="stylesheet" />

</head>
<body background="../PracticaCorreo/img/fondo01.jpg" bgcolor="FFCECB">
<header class="logo">
   <a href="ct_start.html"><img src="../PracticaCorreo/img/logo2.jpg" alt="Call of duty" /></a>
   <div>
   <ul>
         <!-- <li><a href="../PracticaCorreo/correos.php">Mensajes</a></li> -->
         <li><a href="../PracticaCorreo/mandarmsg.html">Enviar Mensaje</a></li>    
         <li><a href="../PracticaCorreo/mostrarCuenta.php">Mi Cuenta</a></li>
         <li><a href="../PracticaCorreo/cerrarseccion.php">Cerrar Sesion</a></li>
      </ul>
      </div>   
  </header>
<table style="width:50%">
<caption>Mensajes Recibidos</caption>
<tr>
<th>Fecha</th>
<th>Remitente</th>
<th>Asunto</th>
<th>Acccion<th>
    </tr>
    <?php
    include'../PracticaCorreo/coneccion.php';
    $sql = "SELECT * FROM mensaje where correo_eliminado!='S'";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row["mail_fecha"] . "</td>";
            echo" <td>". $row['usu_remitente'] . "</td>";
            echo "<td>" . $row["mail_asunto"] . "</td>";
            echo "<td><a href='mostrarmsgu.php?codigo=".$row['mail_codigo']."'>Leer</a></td>";
        }
    }else{
        echo "<tr>";
        echo '<td colspan="10" class="db_null"><p>No tienes mensajes recibidos</p><i class="fas fa-exclamation-circle"></i></td>';
        echo "</tr>";
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