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
    $clasi = $_POST['clasi'];
    $loginId = $_SESSION['id'];
		
    if(empty($name)) {				
        if(empty($name)) {
            echo "<font color='red'>ERROR.</font><br/>";
        }
        echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
    } else {
        $result = mysqli_query($mysqli, "INSERT INTO tareas(name, clasi, login_id) VALUES('$name', '$clasi', '$loginId')");
		
        echo "<font color='green'>Tarea agregada correctamente.";
        echo "<br/><a href='index.php'>Home</a>";

    }
}
?>