<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
<?php
include_once("connection.php");
$id = $_GET['id'];
$status = $_POST['status'];
    $result=mysqli_query($mysqli, "UPDATE tareas SET status= 'terminado' WHERE id = $id");
header("Location:index.php");
?>