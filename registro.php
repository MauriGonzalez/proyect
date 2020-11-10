		
<?php 

session_start();

if ( !empty($_GET) ) 
{
	
	$clave   =	!empty($_GET['clave'])  ? $_GET['clave'] : false ;
	$usuario =	!empty($_GET['usuario'])  ? $_GET['usuario'] : false ;
	$email    =	!empty($_GET['email'])  ? $_GET['email'] : false ;
	$errores  = array(); 
	/*
		var_dump($clave);
		var_dump($usuario);
		var_dump($password);
		var_dump($email); 

	*/

	if (  validar( $clave , $usuario , $email )  == true  )
	{
		
		$guardar_usuario = false; #cuando este sea true. el usuario abra sido guardado

		if( count($errores) == 0 ) #si hay 0 errores ciframos e
		{
		$password_cifrada = password_hash($password, PASSWORD_BCRYPT,['cost' => 4 ]);#cifrar 4 veces
		$password_comparacion = password_verify($password, $password_cifrada);
				
			if( $password_comparacion = true ) # si coincide con el hash insertamos query
			{
				echo "estamos dentro de la query<br>";

				#revisar consulta
				$pdo = new PDO ("mysql: localhost=host;dbname=myndb",'root','');
				$sql = "INSERT INTO usuarios VALUES(null,:clave,:nombre,:apellido,:email)";

				$stmt = $pdo -> query($sql);

				$stmt -> bindParam(':clave',$password_cifrada);
				$stmt -> bindParam(':nombre',$nombre);
				$stmt -> bindParam(':apellido',$apellido);
				$stmt -> bindParam(':email',$email);
			
				$stmt -> execute();

				var_dump($stmt);

				$guardar_usuario = true;
				
				#header("refresh: 3; index.php");
			}
			else{

				$_SESSION['errores']['general'] = 'la contraseña es incorrecta';
				echo "la contraseña es incorrecta";
			}		
		}else{
			echo "fuera del count";
		}

	}else{
		echo 'fuera del validado';
	}

}else{
		//guardamos en la session todos los errrores
		$_SESSION['errores'] = $errores;
		header("refresh: 3; index.php");

	}






function validar( $clave , $usuario , $email  ) 
{
	#validar datos (https://www.youtube.com/watch?v=kCH6xh6oVSs)
	$claveValidado;
	$usuarioValidado;
	$emailValidado;

	
	#clave
	if (!empty($clave) )  {

		$claveValidado = true;

		}else{

			$errores['clave'] = 'error en validacion del clave';
			$claveValidado = false;
		}



	if (!empty($usuario ) &&
	    !is_numeric($usuario ) &&
	    !is_numeric($usuario [0]) )  {

		$usuarioValidado = true;
	
		}else{

			$errores['usuario'] = 'error en validacion del usuario';
			$usuarioValidado = false;
		}


	#email
	if (!empty($email) &&
		filter_var($email,FILTER_VALIDATE_EMAIL)  )  {

		$emailValidado = true;

		}else{

			$errores['email'] = 'error en validacion del email';
			$emailValidado = false;
		}

	
	#si todos cumplen la condicion entonces la funcion rettonrna true
	if ( 	($claveValidado == true) &&
			($usuarioValidado == true) &&
			($emailValidado == true) ) {

			return true;

	}

}



















/*
if (  true  )
	{
	
		$guardar_usuario = false; #todavia no pudimos guardar el usuario, cuando este sea true. el usuario abra sido guardado

		if( count($errores) == 0 ) #si hay 0 errores ciframos e
		{
			$password_cifrada = password_hash($password, PASSWORD_BCRYPT,['cost' => 4 ]);#cifrar 4 veces
	
			if( password_verify($password, $password_cifrada) ) # si coincide con el hash insertamos query
			{
		
				$pdo = new PDO ("mysql: localhost=host;dbname=myndb",'root','');
				$sql = "INSERT INTO usuarios VALUES(null,:password_cifrada,:usuario,:email,:activado,$fecha)";

				$stmt = $pdo -> query($sql);
				$guardar_usuario = true;
				echo "consulta exitosa";
				#header("refresh: 3; index.php");
			}
			else{

				$_SESSION['errores']['general'] = 'la contraseña es incorrecta';
				echo "la contraseña es incorrecta";
			}		
		}else{
			echo "fuera del count";
		}

	}else{
		echo 'fuera del validado';
	}
	*/