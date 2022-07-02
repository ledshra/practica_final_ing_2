<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
include_once("connection.php");

if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    $name = $_POST['name'];
    $clasi = $_POST['clasi'];
	
    if(empty($name) || empty($clasi)) {				
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        if(empty($clasi)) {
            echo "<font color='red'>Clasi field is empty.</font><br/>";
        }
    } else {
        $result = mysqli_query($mysqli, "UPDATE tareas SET name='$name', clasi='$clasi' WHERE id=$id");
        header("Location: index.php");
    }
}
?>
<?php
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM tareas WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $clasi = $res['clasi'];
}
?>
<html>
<head>	
    <title>Editar</title>
    <link rel="stylesheet" type="text/css" href="styleedit.css">
</head>

<body>
    <a href="index.php"><button class="l">Home</button></a>
    <a href="logout.php"><button>Cerrar Seción</button></a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php" class="container">
                <div>
                    <h1>Editar Tarea</h1>
                    <input type="text" name="name" value="<?php echo $name;?>"class="q">
                    <h1>Editar Clasificacion</h1>
                    <input type="text" name="clasi" value="<?php echo $clasi;?>"class="q">
                    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                    <input class="r" type="submit" name="update" value="Actualizar" >
                </div>
    </form>
</body>
</html>