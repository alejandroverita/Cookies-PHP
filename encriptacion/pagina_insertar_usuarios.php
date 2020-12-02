<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<?php

	$usuario= $_POST["usu"];
	$contrasenia= $_POST["contra"];

	//encriptacion. 1era parametro: info que queremos cifrar. 2do el modo de encriptacion

	$pass_cifrado=password_hash($contrasenia, PASSWORD_DEFAULT, array('cost'=>12));
	
	
				
	try{

		$base=new PDO('mysql:host=localhost; dbname=curso_sql', 'root', '');
		
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$base->exec("SET CHARACTER SET utf8");		
		
		
		$sql="INSERT INTO usuarios_pass (USUARIOS, PASSWORD) VALUES (:usu, :contra)";
		
		$resultado=$base->prepare($sql);		
		
		
		$resultado->execute(array(":usu"=>$usuario, ":contra"=>$pass_cifrado));	//CAMBIAR POR CONTRASENIA A PASS CIFRADO	
		
		
		echo "Registro insertado";
		
		$resultado->closeCursor();

	}catch(Exception $e){			
		
		
		echo "Línea del error: " . $e->getLine();
		
	}finally{
		
		$base=null;
		
		
	}

?>
</body>
</html>