<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../PracticaCorreo/login.html");
}
// elseif ($_SESSION['rol'] == 'user') {
//     header("Location: ../usuario/index.php");
// } 
?>
<?php
session_start();

session_destroy();
header("Location: ../PracticaCorreo/login.html");


?>