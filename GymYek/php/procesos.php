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
			$query->bind_param('sssssssssss', $nombre, $apeP, $apeM, $fnac, $edad, $peso, $altura,
			 $tel, $dir, $dieta, $obs);
			if($query->execute()){
				echo "Si inserto     ";
			}else{
				echo "faCHOOo la puta madre";
			}
		}

		public function insertPago($cantidad, $fpago, $idclie){
			$stmt = "INSERT INTO pagos VALUES (0, ?, ?, ?)";
			$query = $this->dbConx->prepareQ($stmt);
			$query->bind_param('sss', $cantidad, $fpago, $idclie);
			if($query->execute()){
				echo "Si inserto el pago     ";
			}else{
				echo "faCHOOo la puta madre   ";
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