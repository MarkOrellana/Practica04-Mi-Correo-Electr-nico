<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==false){
        header("Location: ../PracticaCorreo/login.html");
    }else if($_SESSION['usu_rol'] == "U"){
        header("Location: ../PracticaCorreo/index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eliminar correo</title>
</head>
<body>
    <?php
    include'../PracticaCorreo/coneccion.php';
    $codigo = $_GET["codigo"];
    //Si voy a eliminar físicamente el registro de la tabla
    //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
    $sql = "UPDATE mensaje SET correo_eliminado = 'S' WHERE mail_codigo = $codigo";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha eliminado el correo correctamemte!!!</p>";
        header('Refresh: 2; URL=../PracticaCorreo/index.php');
    }else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
    $conn->close();
    ?>
</body>
</html>