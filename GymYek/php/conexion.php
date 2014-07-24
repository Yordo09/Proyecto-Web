<?php

	class DB 
	{	
		private $_mysqli,
				$_query,
				$_results = array(),
				$_count = 0;

		public static $instance;

		public static function getInstance(){
			if(!isset(self::$instance)){
				self::$instance = new DB();
			}
			return self::$instance;
		}

		private function __construct(){
			$this->_mysqli = new mysqli('localhost', 'root', "", 'proyectoyek');
			if($this->_mysqli->connect_error){
				die($this->_mysqli->connect_error);
			}
		}

		/**public function insertCliente($nombre, $apeP, $apeM, $fnac, $edad, $peso, $altura, $tel, $dir, $dieta, $obs){
			$stmt = $this->_mysqli->prepare("INSERT INTO cliente VALUES (0 , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param('sssssssssss', $nombre, $apeP, $apeM, $fnac, $edad, $peso, $altura, $tel, $dir, $dieta, $obs);
			if($stmt->execute()){
				echo "Si inserto";
			}else{
				echo "fallo la puta madre";
			}
			$stmt->close(); 

		}**/


		public function prepareQ($stmt){
			return $this->_mysqli->prepare($stmt);
		}

	}

?>