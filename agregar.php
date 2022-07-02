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
     if(empty($clasi)) {
            echo "<font color='red'>Quantity field is empty.</font><br/>";
        }
        echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
    } else {
        $result = mysqli_query($mysqli, "INSERT INTO tareas(name, clasi, login_id) VALUES('$name', '$clasi', '$loginId')");
	header("Location:index.php");

    }
}
?>