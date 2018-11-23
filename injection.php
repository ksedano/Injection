<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>LOGIN</h1>
<form action="#" method="post">
	<label >Usuario</label> 
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

 		$conn = new PDO('mysql:host=localhost;dbname=m7_injection','Kevin','kevin123');
 		//"INSERT INTO login(ID,USER,PASSWD) VALUES(3,'eric',SHA('contraseña'));"	
 		$consulta = $conn->prepare("SELECT * FROM login WHERE USER= :user AND PASSWD=SHA2(:password,512);");
 		$consulta-> bindValue(':user', $USUARIO);
 		$consulta-> bindValue(':password', $PASSWORD);
 		$consulta-> execute();
 		foreach ($consulta as $key => $value) {
 			print_r($value);
 		}
 		$numero=$consulta->rowCount();
 		if ($numero==1) {
 		 	echo "<br>Hola, $USUARIO";
 		 } 
 		
 		
 	?>
</body>
</html>