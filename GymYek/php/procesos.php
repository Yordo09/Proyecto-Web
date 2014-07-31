<?php
	require_once("conexion.php");


	/**
	* 
	*/
	class procesos
	{
		public $dbConx;
		private $stmt;
		
		function __construct()
		{
			$this->dbConx = DB::getInstance();
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


	}

		/**$dbConn = new procesos();

		$nombre = $_POST['nombre'];
		$apepat = $_POST['apepat'];
		$apemat = $_POST['apemat'];
		$fnac = $_POST['fnac'];
		$edad = $_POST['edad'];
		$peso = $_POST['peso'];
		$altura = $_POST['altura'];
		$telefono = $_POST['tel'];
		$dir = $_POST['dir'];
		$dieta = $_POST['dieta'];
		$obs = $_POST['obs'];
		
		echo $fnac;


		
		$conx = $instance->getConexion();
				
		$conx = $instance->getConexion()


		$dbConn->insertCliente($nombre, $apepat, $apemat, $fnac, $edad, $peso, $altura, $telefono, $dir, $dieta, $obs);

		mysqli_query($dbConx->getConnection(), "INSERT INTO `usuarios`(`Nombre`, `Telefono`) VALUES ('$nombreRegistrado','$telefonoRegistrado')");

		echo "<br> Guardado correctamente <br>";**/

?>