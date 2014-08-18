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
						<li><a href="php/unset.php">Log Out</a></li>
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
						    	<td>Cantidad: <input type="text" name="accion" value="inserPago" hidden></td>
						    	<td><input type="number" name="canti" min="1" value="0" required></input></td>
							</tr>
							<tr>
							    <td>Fecha de pago: </td>
							    <td><input type="date" name="fpago" required></input></td>
							</tr>
							<tr>
							    <td>Numero de Cliente: </td>
							    <td><input type="number" name="idClien" min="1" value="0" required></input></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" align="center" name="btnPago" value="Guardar Pago"></td>
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