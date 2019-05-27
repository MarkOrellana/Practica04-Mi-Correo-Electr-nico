<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
        header("Location: ../PracticaCorreo/login.html");
    }
    // else if($_SESSION['usu_rol'] == "A"){
    //     header("Location: ../../../admin/vista/admin/admin_index.php");
    // }
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inicio-Usuario</title>
    <link href="../PracticaCorreo/css/nav1.css" rel="stylesheet" />

</head>
<body background="../PracticaCorreo/img/fondo01.jpg" bgcolor="FFCECB">
    <header>
        <div id="navHeader">
            <ul>
            <!-- <li><a href="../PracticaCorreo/correosusuario.php">Mensajes</a></li> -->
         <li><a href="../PracticaCorreo/mandarmsg.html">Enviar Mensaje</a></li>
         <li><a href="../PracticaCorreo/mostrarCuenta.php">Mi Cuenta</a></li>
         <li><a href="../PracticaCorreo/cerrarseccion.php">Cerrar Sesion</a></li>
            </ul> 
    </header>
    <div id="tituloIndex">
        <h1>Datos Personales</h1>
    </div>
    <table>
        <?php
        include'../PracticaCorreo/coneccion.php';
        $codigo=$_SESSION['usu_codigo'];
        $sql = "SELECT * FROM usuario WHERE usu_codigo='$codigo'";
        $result = $conn->query($sql);
        $row=$result->fetch_assoc();
        if ($result->num_rows > 0) {
            echo '<div>';
                echo '<div>';  
                    echo '<p>Nombre: '.$row['usu_nombres'].'</p>';
                echo '</div>';
                
                echo '<div>';  
                    echo '<p>Telefono: '.$row['usu_telefono'].'</p>';
                echo '</div>';
            
                echo '<div >';  
                    echo '<p>Correo: '.$row['usu_correo'].'</p>';
                echo '</div>';
            
                echo '<div>';  
                    echo '<a href="update.php">Modificar Cuenta</a>';
                echo '</div>';
            
            echo '</div>';
            
        } else { 
            echo "<p>Error encontrado.</p>";
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