<?php session_start() ?>
<!--login-->

<aside id="sidebar" class="bloque"><!--misma clase para mismo estilo-->
	<div id="login">
		<h3>identificate</h3>
		<form action="login.php" method="POST">
			<label for="">email</label>
			<input type="email" name="email">
			<label for="">clave</label>
			<input type="password" name="clave">
			<input type="submit" value="entrar">
		</form>
	</div>
</aside>


<!--registrate-->

<aside id="sidebar" class="bloque"><!--misma clase para mismo estilo-->
	<div id="registrate">
		

		<h3>registrate</h3>
		<!-- si tenemos un error mostramos -->

		<?php 	
		if(isset($_SESSION['errores']))
		{	
			var_dump($_SESSION['errores']);
		} 

		?>
		 	
		<form action="registro.php" method="GET">
			<label for="">clave</label>
			<input type="clave" name="nombre">
			<label for="">usuario</label>
			<input type="text" name="usuario">
			<label for="">email</label>
			<input type="email" name="email">
			<input type="submit" value="entrar">
		</form>
	</div>
</aside>

