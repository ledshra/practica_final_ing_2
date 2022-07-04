
<?php session_start(); ?>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="stylelogin.css">
</head>
<?php
$month=date("n");
$year=date("Y");
$diaActual=date("j");
$diaSemana=date("w",mktime(0,0,0,$month,1,$year));
if($diaSemana==0) $diaSemana=7;
$ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));
 
$meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
"Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
	<title></title>
	<meta charset="utf-8">
	<style>
		#calendar {
			font-family:Arial;
			font-size:12px;
		}
		#calendar caption {
			text-align:left;
			padding:5px 10px;
			background-color:#003366;
			color:#fff;
			font-weight:bold;
		}
		#calendar th {
			background-color:#006699;
			color:#fff;
			width:20px;
		}
		#calendar td {
			text-align:right;
			padding:2px 5px;
			background-color:silver;
		}
		#calendar .hoy {
			background-color:red;
		}
	</style>
</head>
 
<body>
<table id="calendar" align="right">
	<caption><?php echo $meses[$month]." ".$year?></caption>
	<tr>
		<th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th>
		<th>Vie</th><th>Sab</th><th>Dom</th>
	</tr>
	<tr bgcolor="silver">
		<?php
		$last_cell=$diaSemana+$ultimoDiaMes;
		
		for($i=1;$i<=42;$i++)
		{
			if($i==$diaSemana)
			{
				
				$day=1;
			}
			if($i<$diaSemana || $i>=$last_cell)
			{
				
				echo "<td>&nbsp;</td>";
			}else{
				
				if($day==$diaActual)
					echo "<td class='hoy'>$day</td>";
				else
					echo "<td>$day</td>";
				$day++;
			}
			if($i%7==0)
			{
				echo "</tr><tr>\n";
			}
		}
	?>
	</tr>
</table>
</body>
</html>

<body>
<?php
include("connection.php");

if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($mysqli, $_POST['username']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

    if($user == "" || $pass == "") {
        echo "<br/>";
        echo "<br/>";
        echo "<center><h1>ERROR.</h1>";
        echo "<br/>";
        echo "<h1>Usuario o contraseña Vacio</h1>.";
        echo "<br/>";
        echo "<a href='login.php'><h1>Volver</h1></a>";
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
        or die("<center><h1>ERROR.</h1>");
        
        $row = mysqli_fetch_assoc($result);
        
        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
        } else {
            echo "<br/>";
            echo "<br/>";
            echo "<center><h1>ERROR.</h1>";
            echo "<br/>";
            echo "Usuario o contraseña erronea.";
            echo "<br/>";
            echo "<a href='login.php'><h1>Volver</h1></a>";
        }

        if(isset($_SESSION['valid'])) {
            header('Location: index.php');          
        }
    }
} else {
?>

    <form name="form1" method="post" action="" class="container">
    <div>
    <h1 class="lab">Login</h1>
             <h2 class="lab">Usuario</h2>
                <input type="text" name="username" placeholder="Usuario">
             <h2 class="lab">Contraseña</h2>
                <input type="password" name="password" placeholder="Contraseña">
            <br>
            <br>
                <td><input class="in" type="submit" name="submit" value="Login"></td>
                <td><a href="registro.php">Ir a Registro</a></td>
    </div>
    </form>
<?php
}
?>

</body>
</html>