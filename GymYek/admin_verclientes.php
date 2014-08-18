<?php
/**codigo para las sesiones**/
	session_start();
	
	if (isset($_SESSION['username'])) {
		switch ($_SESSION['nivel']) {
			case '1':
				
				break;
			case '2':
				header("Location: /GymYek/empleado.php");
				break;
			case '3':
				header("Location: /GymYek/empleadoInstructor.php");
				break;
			case '4';
				header("Location: /GymYek/cliente.php");
				break;
			default:
				# code...
				break;
		}
		/**echo 'Welcome, '.$_SESSION['username'];**/
	}else{
		header("Location: /GymYek/login.php");
	}
?>
<!DOCTYPE>
<html>
	<head>
		<meta charset = "UTF-8">
		<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
		<script type="text/javascript" src="script/jquery-1.11.1.js"></script>
		<script type="text/javascript" src="script/llamar.js"></script>
		<title>Gimnasio Yek</title>
	</head>

	<body>

		<header>
			<div id="subheader">
				<div id="logotipo"><p><a href="admin.php">Gimnasio Yek</a></p></div>
				<nav>
					<ul>
						<li><a href="admin_pagos.php">Pagos</a></li>
						<li><a href="admin_verPagos.php">Verificar Pagos</a></li>
						<li><a href="admin_clientes.php">Clientes</a></li>
						<li><a href="admin_verclientes.php" id="VerC">Ver Clientes</a></li>
						<li><a href="admin_empleados.php">Empleado</a></li>
						<li><a href="php/unset.php">Log Out</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<section id="wrap">

			<section id="main">

				<section id="bienvenidos">
					<article>
						<hgroup><h2 align="center">Clientes</h2></hgroup>
						<div id="centroTabla" align="center">
						<!--<table width="50%" border="1" align="center">
						    <tr><form action="php/usuario.php" name="formCliente" method="post">
						    	<td><input type="text" name="accion" value="Vcliente" hidden></td>
								<td><input type="submit" align="center" name="btnGuardar" value="Guardar"></input></td>
							</tr>
							</form>
						

						</table>-->
						</div>
					</article>

				</section>

			</section>

			<footer>

			</footer>

			<div id="copyright"><p>Creado por Jose Antonio Esquinca Bonilla</p><BR>2012-2013</div>

		</section>

	</body>
</html>