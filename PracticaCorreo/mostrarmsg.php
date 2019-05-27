<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
        header("Location: ../PracticaCorreo/login.html");
    }else if($_SESSION['usu_rol'] == "U"){
        header("Location: ../PracticaCorreo/index.php");
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inicio-Usuario</title>
    <link rel="stylesheet" type="text/css" href="../../../public/estilos/admin.css">
</head>
<body>
    <header>
    </header>
    <div id="tituloIndex">
        <h1>Correo</h1>
    </div>
    <table>
        <?php
        include '../PracticaCorreo/coneccion.php';
        $codigo=$_GET["codigo"];
        $sql = "SELECT * FROM mensaje WHERE mail_codigo='$codigo'";
        $result = $conn->query($sql);
        $row=$result->fetch_assoc();
        if ($result->num_rows > 0) {
            echo '<div id="correo">';
                echo '<div>';  
                    echo '<p>De: '.$row['usu_remitente'].'</p>';
                echo '</div>';
                
                echo '<div >';  
                    echo '<p>Para: '.$row['usu_destino'].'</p>';
                echo '</div>';
            
                echo '<div>';  
                    echo '<p>Asunto: '.$row['mail_asunto'].'</p>';
                echo '</div>';
            
                echo '<div>';  
                    echo '<p>Mensaje: '.$row['mail_mensaje'].'</p>';
                echo '</div>';
                
                echo '<div id="eliminar">';  
                    echo '<a href="../PracticaCorreo/eliminar_correo.php?codigo='.$row['mail_codigo'].'">Eliminar</a>';
                echo '</div>';
            
            echo '</div>';
            
        } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
            echo "</tr>";
        }
        $conn->close();
        ?>
    </table>
    
    
</body>
</html>