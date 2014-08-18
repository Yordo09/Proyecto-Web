<?php
	require_once("conexion.php");
					ob_start();
				session_start();
	class procesos
	{
		public $dbConx;
		private $stmt;
		public $idclie;
		

		function __construct()
		{
			$this->dbConx = DB::getInstance();
		}

		public  function logeo($name,$pass){

			$tipou = "";

			$stmt = "SELECT user, pass, idtipou, idclie FROM usuario WHERE user = ? AND pass = ?";
			$query =$this->dbConx->prepareQ($stmt);
			$query->bindParam(1,$name);
			$query->bindParam(2,$pass);
			$query->execute();

			$row = $query->fetch();
			
			if($row['user']==$name & $row['pass']==$pass){

				$_SESSION['username'] = $row['user'];
				$tipou = $row['idtipou'];
				$_SESSION['idcliente'] = $row['idclie'];
				
				switch ($tipou) {
					case '1':
						header("Location: /GymYek/admin.php");
						$_SESSION['nivel'] = '1';
						break;
					case '2':
						header("Location: /GymYek/empleado.php");
						$_SESSION['nivel'] = '2';
						break;
					case '3':
						header("Location: /GymYek/empleadoInstructor.php");
						$_SESSION['nivel'] = '3';
						break;
					case '4':
						header("Location: /GymYek/cliente.php");
						$_SESSION['nivel'] = '4';
						break;
					default:
						# code...
						break;
				}
			}else{
				header("Location: /GymYek/login.php");
			}
		}

		public function selectRutina(){
			
			$stmt = "SELECT rutina, series, repeticiones, dia FROM rutina WHERE idclie = ?";
			$query =$this->dbConx->prepareQ($stmt);
			$query->bindParam(1, $_SESSION['idcliente']);

			$query->execute();
			
			     	echo "<table width=50% border= 1 align=center>";
            		
               		echo "<tr>";
	            		echo "<th>Rutina</th>";
	            		echo "<th>Series</th>";
	            		echo "<th>Repeticiones</th>";
	            		echo "<th>Dia</th>";
            		echo "</tr>";
            		

        	 while($row = $query->fetch())
            	{
            		echo "<form action=usuario.php method=post";
            		echo "<tr>";
	            		echo "<td>" .$row['rutina'].  " </td>";
	            		echo "<td>" .$row['series'].  " </td>";
	            		echo "<td>" .$row['repeticiones'].  " </td>";
	            		echo "<td>" .$row['dia'].  " </td>";
            		echo "</tr>";
            		echo "</form>";
        		}
        		echo "</table>";
		}

		public function selectDieta(){
			$stmt ="SELECT dieta from cliente WHERE idcliente = ?"; 
            $query= $this->dbConx->prepareQ($stmt);
            $query->bindParam(1, $_SESSION['idcliente']);
        	$query->execute();

        	echo "<table width=50% border= 1 align=center>";
            		
               		echo "<tr>";
	            		echo "<th>Dieta</th>";
            		echo "</tr>";
            		

        	 while($row = $query->fetch())
            	{
            		echo "<form action=usuario.php method=post";
            		echo "<tr>";
	            		echo "<td>" .$row['dieta'].  " </td>";
            		echo "</tr>";
            		echo "</form>";	
        		}
        		echo "</table>";
		}

		public function selectObservaciones(){
			$stmt ="SELECT observaciones from cliente WHERE idcliente = ?"; 
            $query= $this->dbConx->prepareQ($stmt);
            $query->bindParam(1, $_SESSION['idcliente']);
        	$query->execute();
        	


        	echo "<table width=50% border= 1 align=center>";
               		echo "<tr>";
	            		echo "<th>Observaciones del Instructor</th>";
            		echo "</tr>";
        	 while($row = $query->fetch())
            	{
            		echo "<form action=usuario.php method=post";
            		echo "<tr>";
	            		echo "<td>" .$row['observaciones'].  " </td>";
            		echo "</tr>";
            		
            		echo "</form>";
        		}
        		echo "</table>";
		}

		public function insertCliente($nombre, $apeP, $apeM, $fnac, $edad, $peso, $altura, $tel, $dir, $dieta, $obs){
			$stmt = "INSERT INTO cliente VALUES (0 , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$query = $this->dbConx->prepareQ($stmt);
			$query->bindParam(1, $nombre);
			$query->bindParam(2, $apeP);
			$query->bindParam(3, $apeM);
			$query->bindParam(4, $fnac);
			$query->bindParam(5, $edad);
			$query->bindParam(6, $peso);
			$query->bindParam(7, $altura);
			$query->bindParam(8, $tel);
			$query->bindParam(9, $dir);
			$query->bindParam(10, $dieta);
			$query->bindParam(11, $obs);

			if($query->execute()){
				echo "Si inserto     ";
			}else{
				echo "faCHOOo la puta madre";
			}
		}

		public function insertEmpleado($nombreEm, $apePEm, $apeMEm, $fnacEm, $edadEm, $sexo, $telEm, $idEm){
			$stmt = "INSERT INTO empleado VALUES (0 , ?, ?, ?, ?, ?, ?, ?, ?)";

			$query = $this->dbConx->prepareQ($stmt);
			$query->bindParam(1, $nombreEm);
			$query->bindParam(2, $apePEm);
			$query->bindParam(3, $apeMEm);
			$query->bindParam(4, $fnacEm);
			$query->bindParam(5, $edadEm);
			$query->bindParam(6, $sexo);
			$query->bindParam(7, $telEm);
			$query->bindParam(8, $idEm);

			if($query->execute()){
				echo "Si inserto     ";
			}else{
				echo "    faCHOOo la puta madre";
				print_r($query->errorInfo());
				
			}
		}

		public function insertPago($cantidad, $fpago, $idclie){
			$stmt = "INSERT INTO pagos VALUES (0, ?, ?, ?)";
			$query = $this->dbConx->prepareQ($stmt);
			$query->bindParam(1, $cantidad);
			$query->bindParam(2, $fpago);
			$query->bindParam(3, $idclie);
			if($query->execute()){
				echo "Si inserto el pago     ";
			}else{
				echo "faCHOOo la puta madre   ";
			}
		}

		public function verClientes() {
			$stmt ="SELECT idcliente, nombre, apepat, apemat, fnac, edad, peso, altura, telefono from cliente"; 
            $query= $this->dbConx->prepareQ($stmt);
        	$query->execute();
        	


        	echo "<table width=50% border= 1 align=center>";
            		
               		echo "<tr>";
	            		echo "<th>ID Cliente</th>";
	            		echo "<th>Nombre</th>";
	            		echo "<th>Apellido Paterno</th>";
	            		echo "<th>Apellido Materno</th>";
	            		echo "<th>Fecha Nacimiento</th>";
	            		echo "<th>Edad</th>";
	            		echo "<th>Peso</th>";
	            		echo "<th>Altura</th>";
	            		echo "<th>Telefono</th>";
            		echo "</tr>";
            		

        	 while($row = $query->fetch())
            	{
            		echo "<form action=usuario.php method=post";
            		echo "<tr>";
	            		echo "<td>" .$row['idcliente'].  " </td>";
	            		echo "<td>" .$row['nombre'].  " </td>";
	            		echo "<td>" .$row['apepat'].  " </td>";
	            		echo "<td>" .$row['apemat'].  " </td>";
	            		echo "<td>" .$row['fnac'].  " </td>";
	            		echo "<td>" .$row['edad'].  " </td>";
	            		echo "<td>" .$row['peso'].  " </td>";
	            		echo "<td>" .$row['altura'].  " </td>";
	            		echo "<td>" .$row['telefono'].  " </td>";
            		echo "</tr>";
            		
            		echo "</form>";
            		

        		}
        		echo "</table>";
    	}


    	public function updClienDieta($diet, $idcli){
    		$stmt ="UPDATE cliente SET dieta = ? WHERE idcliente = ?"; 
            $query= $this->dbConx->prepareQ($stmt);
			$query->bindParam(1, $diet);
			$query->bindParam(2, $idcli);

			if($query->execute()){
				echo "Si hizo el update    ";
			}else{
				echo "faCHOOo la puta madre   ";
			}
    	}

    	public function updClienObs($ob, $idcli){
    		$stmt ="UPDATE cliente SET observaciones = ? WHERE idcliente = ?"; 
            $query= $this->dbConx->prepareQ($stmt);
			$query->bindParam(1, $ob);
			$query->bindParam(2, $idcli);

			if($query->execute()){
				echo "Si hizo el update    ";
			}else{
				echo "faCHOOo la puta madre   ";
			}
    	}

    	public function insertRutina($rutina, $series, $repeticiones, $dia, $idcli){
			$stmt = "INSERT INTO rutina VALUES (0 , ?, ?, ?, ?, ?)";
			$query = $this->dbConx->prepareQ($stmt);
			$query->bindParam(1, $rutina);
			$query->bindParam(2, $series);
			$query->bindParam(3, $repeticiones);
			$query->bindParam(4, $dia);
			$query->bindParam(5, $idcli);

			if($query->execute()){
				echo "Si inserto...     ";
			}else{
				echo "faCHOOo la puta madre WN CULIaooo LA CSM";
			}
		}

		public function difdeFecha($startdate, $enddate){
			/**$stmt = "SELECT DATEDIFF('2014-08-15','2014-09-14')";**/
			$dias = 31;

			$stmt = "SELECT DATEDIFF(?, ?)";
			
			$query = $this->dbConx->prepareQ($stmt);
			$query->bindParam(1, $startdate);
			$query->bindParam(2, $enddate);
			$query->execute();
			$row = $query->fetchColumn();
			
			$res = $row;

			if($res > 31){
				echo "<td> Adeudo </td>";
			}else{
				echo "<td> Pagado </td>";
			}
		}

		public function selectFechaPago($idclienow){
			$stmt = "SELECT fpago FROM pagos WHERE idclie = ?";
			
			$query = $this->dbConx->prepareQ($stmt);
			$query->bindParam(1, $idclienow);
			
			$query->execute();
			$row = $query->fetch();

			$res = $row['fpago'];

			return $res;
		}

		public function checarFechaPago(){
			$datenow = date('Y-m-d');

			$stmt ="SELECT idcliente, nombre, apepat, apemat from cliente"; 
            $query= $this->dbConx->prepareQ($stmt);
        	$query->execute();
        	


        	echo "<table width=50% border= 1 align=center>";
            		
               		echo "<tr>";
	            		echo "<th>ID Cliente</th>";
	            		echo "<th>Nombre</th>";
	            		echo "<th>Apellido Paterno</th>";
	            		echo "<th>Apellido Materno</th>";
	            		echo "<th>Estado de pago</th>";
            		echo "</tr>";
            		

        	 while($row = $query->fetch())
            	{	
            		$idclientenow = $row['idcliente'];
            		$startD = $this->selectFechaPago($idclientenow);
            		
            		echo "<tr>";
	            		echo "<td>" .$row['idcliente'].  " </td>";
	            		echo "<td>" .$row['nombre'].  " </td>";
	            		echo "<td>" .$row['apepat'].  " </td>";
	            		echo "<td>" .$row['apemat'].  " </td>";
	            		$this->difdeFecha($datenow, $startD);
	            		/**echo "<td> Chekeo de pago </td>";**/
            		echo "</tr>";
            		

            		

        		}
        		echo "</table>";
		}	

	}
?>