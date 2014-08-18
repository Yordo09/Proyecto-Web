<?php
/**codigo para las sesiones**/
	session_start();
	
	if (isset($_SESSION['username'])) {
		switch ($_SESSION['nivel']) {
			case '1':
				header("Location: /GymYek/admin.php");
				break;
			case '2':
				header("Location: /GymYek/empleado.php");
				break;
			case '3':
				header("Location: /GymYek/empleadoInstructor.php");
				break;
			case '4';
				
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
		<script type="text/javascript" src="script/llamarDieta.js"></script>
		<title>Gimnasio Yek</title>
	</head>

	<body>

		<header>
			<div id="subheader">
				<div id="logotipo"><p><a href="cliente.php">Gimnasio Yek</a></p></div>
				<nav>
					<ul>
						<li><a href="cliente.php">Rutina</a></li>
						<li><a href="clienteDieta.php">Dieta</a></li>
						<li><a href="clienteObs.php">Observaciones</a></li>
						<li><a href="php/unset.php">Log Out</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<section id="wrap">

			<section id="main">
			
				<section id="bienvenidos">
					<article>
						<hgroup><h2 align="center">Dieta</h2></hgroup>
						<div id="centroTabla" align="center"></div>

					</article>

				</section>

			</section>

			<footer>

			</footer>

			<div id="copyright"><p>Creado por Jose Antonio Esquinca Bonilla</p><BR>2012-2013</div>

		</section>

	</body>
</html>