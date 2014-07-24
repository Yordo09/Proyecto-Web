<?php
	require_once("procesos.php");

	/**
	* 
	*/
	class usuario
	{
		public $db;

		private $nombre;
		private $apepat;
		private $apemat;
		private $fnac;
		private $edad;
		private $peso;
		private $altura;
		private $tel;
		private $dir;
		private $dieta;
		private $obs;

		

		
		function __construct()
		{
			$this->db = new procesos();
			$this->acciones();	
		}

		public function acciones(){
			$this->getAct();
			switch ($this->accion) {
				case 'inserClie':
					$this->insertarCli();
					echo "<a href = '/GymYek/empleado_registroClientes.html' > Volver al menu </a>";
					break;
				case 'inserPago':
					$this->insertarPag();
					echo "<a href = '/GymYek/empleado_registroPagos.html' > Volver al menu </a>";
					break;
				
				default:
					# code...
					break;
			}

		}

		public function getAct (){
		   return $this->accion = $_POST['accion'];
   		}


   		/**-------Tabla Cliente!!!----------**/

		public function getNombre(){
			return $this->nombre = $_POST['nombre'];
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getApepat(){
			return $this->apepat = $_POST['apepat'];
		}

		public function setApepat($apepat){
			$this->apepat = $apepat;
		}

		public function getApemat(){
			return $this->apemat = $_POST['apemat'];
		}

		public function setApemat($apemat){
			$this->apemat = $apemat;
		}

		public function getFnac(){
			return $this->fnac = $_POST['fnac'];
		}

		public function setFnac($fnac){
			$this->fnac = $fnac;
		}

		public function getEdad(){
			return $this->edad = $_POST['edad'];
		}

		public function setEdad($edad){
			$this->edad = $edad;
		}

		public function getPeso(){
			return $this->peso = $_POST['peso'];
		}

		public function setPeso($peso){
			$this->peso = $peso;
		}

		public function getAltura(){
			return $this->altura = $_POST['altura'];
		}

		public function setAltura($altura){
			$this->altura = $altura;
		}

		public function getTel(){
			return $this->tel = $_POST['tel'];
		}

		public function setTel($tel){
			$this->tel = $tel;
		}

		public function getDir(){
			return $this->dir = $_POST['dir'];
		}

		public function setDir($dir){
			$this->dir = $dir;
		}

		public function getDieta(){
			return $this->dieta = $_POST['dieta'];
		}

		public function setDieta($dieta){
			$this->dieta = $dieta;
		}

		public function getObs(){
			return $this->obs = $_POST['obs'];
		}

		public function setObs($obs){
			$this->obs = $obs;
		}
		/** ----------TablaPAGOOO!!----- **/

		public function getCantidad(){
			return $this->cantidad = $_POST['canti'];
		}

		public function setCantidad($cantidad){
			$this->cantidad = $cantidad;
		}

		public function getFpago(){
			return $this->fpago = $_POST['fpago'];
		}

		public function setFpago($fpago){
			$this->fpago = $fpago;
		}

		public function getIdclie(){
			return $this->idclie = $_POST['idClien'];
		}

		public function setIdclie($idclie){
			$this->idclie = $idclie;
		}




		/**---------FUNCIONES DE DB------------**/

		public function insertarCli(){
			$this->db->insertCliente($this->getNombre(),$this->getApepat(),$this->getApemat(),
				$this->getFnac(),$this->getEdad(),$this->getPeso(),$this->getAltura(),$this->getTel(),
				$this->getDir(),$this->getDieta(), $this->getObs());
		}


		public function insertarPag(){
			$this->db->insertPago($this->getCantidad(), $this->getFpago(), $this->getIdclie());
		}

	}

	

	$us = new usuario();




?>