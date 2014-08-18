<?php
/**codigo para las sesiones**/
	session_start();
	
	if (isset($_SESSION['username'])) {
		switch ($_SESSION['nivel']) {
			case '1':
				header("Location: /GymYek/admin.php");
				break;
			case '2':
				
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
				<div id="logotipo"><p><a href="empleado.html">Gimnasio Yek</a></p></div>
				<nav>
					<ul>
						<li><a href="empleado_registroPagos.php">Registrar Pago</a></li>
						<li><a href="empleado_verificarPago.php">Verificar Pagos</a></li>
						<li><a href="empleado_registroClientes.php">Registrar Clientes</a></li>
						<li><a href="empleado_verclientes.php" id="VerC">Ver Clientes</a></li>
						<li><a href="php/unset.php">Log Out</a></li>s
					</ul>
				</nav>
			</div>
		</header>

		<section id="wrap">

			<section id="main">

				<section id="bienvenidos">
					<article>
						<hgroup><h2 align="center">Registro de Clientes</h2></hgroup>
						<div align="center">
						<table width="50%" border="1" align="center">
						    <tr><form action="php/usuario.php" name="formCliente" method="post">
						    	<td>Nombre: <input type="text" name="accion" value="inserClie" hidden></td>
						    	<td><input type="text" name="nombre" required></input></td>
							</tr>
							<tr>
							    <td>Apellido Paterno: </td>
							    <td><input type="text" name="apepat" required></input></td>
							</tr>
							<tr>
							    <td>Apellido Materno: </td>
							    <td><input type="text" name="apemat" required></input></td>
							</tr>
							<tr>
							    <td>Fecha de nacimiento: </td>
							    <td><input type="date" name="fnac" required></input></td>
							</tr>
							<tr>
							    <td>Edad: </td>
							    <td><input type="number" name="edad" min="1" value="0" required></input></td>
							</tr>
							<tr>
							    <td>Peso: </td>
							    <td><input type="number" name="peso" min="1" value="0"></input></td>
							</tr>
							<tr>
							    <td>Altura: </td>
							    <td><input type="number" name="altura" min="1" value="0"></input></td>
							</tr>
							<tr>
							    <td>Telefono: </td>
							    <td><input type="number" name="tel" required></input></td>
							</tr>
							<tr>
							    <td>Direccion: </td>
							    <td><input type="text" name="dir" required></input></td>
							</tr>
							<tr>
							    <td>Dieta: </td>
							    <td><textarea rows="6" cols="40"  name="dieta"></textarea></td>
							</tr>
							<tr>
							    <td>Observaciones: </td>
							    <td><textarea rows="6" cols="40"  name="obs"></textarea></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" align="center" name="btnGuardar" value="Guardar"></input></td>
							</tr>
							</form>
						</table></div>

					</article>

				</section>

			</section>

			<footer>

			</footer>

			<div id="copyright"><p>Creado por Jose Antonio Esquinca Bonilla</p><BR>2012-2013</div>

		</section>

	</body>
</html>