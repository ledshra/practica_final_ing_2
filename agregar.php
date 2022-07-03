<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
include_once("connection.php");

if(isset($_POST['Submit'])) {	
    $name = $_POST['name'];
    $loginId = $_SESSION['id'];
    $fecha=$_POST['fecha'];
    $clasi=$_POST['clasi'];

		
    if(empty($name)) {				
        if(empty($name)) {
            echo "<font color='red'>ERROR.</font><br/>";
        }
        echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
    } else {
        $result = mysqli_query($mysqli, "INSERT INTO tareas(name, login_id, fecha, clasi) VALUES('$name', '$loginId', '$fecha', '$clasi')");
        header("Location:index.php");
    }
}
?>