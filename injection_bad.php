<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>LOGIN</h1>
<form action="#" method="post">
	<label >Usuario:</label> 
	<input type='text' name='nombre'> <br>
	<label >Contraseña:</label> 
	<input type='text' name='password'>
	<input type="submit" name="Envio">
	<br>
</form>
<?php
 	$USUARIO =$_POST["nombre"] ;
 	$PASSWORD =$_POST["password"];
 	echo $USUARIO."<br>";
 	echo $PASSWORD."<br>";
 		$conn = mysqli_connect('localhost','Kevin','kevin123','m7_injection');
 		//"INSERT INTO login(ID,USER,PASSWD) VALUES(3,'eric',SHA('contraseña'));"	
 		$consulta ="SELECT * FROM login WHERE USER= '".$USUARIO."' AND PASSWD=SHA2('".$PASSWORD."',512);";
 		$resultat = mysqli_query($conn, $consulta);
 		if (!$resultat) {
     			$message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
     			$message .= 'Consulta realitzada: ' . $consulta;
     			die($message);
 		}
 		while($registre = mysqli_fetch_assoc($resultat)) {
 			echo "hola, ".$registre['USER']."<br>";
 		}
 	?>
</body>
</html>