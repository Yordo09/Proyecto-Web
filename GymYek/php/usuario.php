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

		private $idclie;
		private $idEm;

		
		function __construct()
		{
			$this->db = new procesos();
			$this->acciones();	
		}

		public function acciones(){
			$this->getAct();
			ob_start();
			/**Cambiarle la URL a todos los heaeders!!! por http://proyectoyek.site40.net/admin_clientes.html**/
			switch ($this->accion) {
				case 'chLog':
					$this->checkLogin();
					break;
				case 'inserClie':
					$this->insertarCli();
					header("Location: /GymYek/empleado_registroClientes.php");
					/**echo "<a href = '/GymYek/empleado_registroClientes.html' > Volver al menu </a>";**/
					break;
				case 'admin_inserClie':
					$this->insertarCli();
					header("Location: /GymYek/admin_clientes.php");
					/**echo "<a href = '/GymYek/empleado_registroClientes.html' > Volver al menu </a>";**/
					break;
				case 'inserPago':
					$this->insertarPag();
					header("Location: /GymYek/empleado_registroPagos.php");
					/**echo "<a href = '/GymYek/empleado_registroPagos.html' > Volver al menu </a>";**/
					break;
				case'admin_Pago':
					$this->insertarPag();
					header("Location: /GymYek/admin_pagos.php");
					break;
				case 'admin_inserEmpleado':
					$this->insertarEmpleado();					
					header("Location: /GymYek/admin_empleados.php");
					break;
				case 'Vcliente':
					$this->verCliente();
					break;
				case 'updDieta':
					$this->upClienDie();
					header("Location: /GymYek/empleadoInstructor_Dieta.php");
					break;
				case 'updObs':
					$this->upClienObs();
					header("Location: /GymYek/empleadoInstructor_Observaciones.php");
					break;
				case 'inserRutina':
					$this->insertarRut();
					header("Location: /GymYek/empleadoInstructor_Rutina.php");
					break;
				case 'VclientePago':
					$this->verCliPago();
					break;
				case 'VclienteRutina':
					$this->verCliRut();
					break;
				case 'VclienteDieta':
					$this->verCliDiet();
					break;
				case 'VclienteObs':
					$this->verCliObs();
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

		/** -----------TablaEmpleado------------- **/

		public function getNombreEm(){
			return $this->nombreEm = $_POST['nombreEm'];
		}

		public function setNombreEm($nombreEm){
			$this->nombreEm = $nombreEm;
		}

		public function getApepatEm(){
			return $this->apepatEm = $_POST['apepatEm'];
		}

		public function setApepatEm($apepatEm){
			$this->apepatEm = $apepatEm;
		}

		public function getApematEm(){
			return $this->apematEm = $_POST['apematEm'];
		}

		public function setApematEm($apematEm){
			$this->apematEm = $apematEm;
		}

		public function getFnacEm(){
			return $this->fnacEm = $_POST['fnacEm'];
		}

		public function setFnacEm($fnacEm){
			$this->fnacEm = $fnacEm;
		}

		public function getEdadEm(){
			return $this->edadEm = $_POST['edadEm'];
		}

		public function setEdadEm($edadEm){
			$this->edadEm = $edadEm;
		}

		public function getSexo(){
			return $this->sexo = $_POST['sexo'];
		}

		public function setSexo($sexo){
			$this->sexo = $sexo;
		}

		public function getTelEm(){
			return $this->telEm = $_POST['telEm'];
		}

		public function setTelEm($telEm){
			$this->telEm = $telEm;
		}

		public function getIdEm(){
			return $this->idEm = $_POST['idEm'];
		}

		public function setIdEm($idEm){
			$this->idEm = $idEm;
		}

		/**---------TABLA RUTINA------------**/


		public function getRutina(){
			return $this->rutina = $_POST['rutina'];
		}

		public function setRutina($rutina){
			$this->rutina = $rutina;
		}

		public function getSeries(){
			return $this->series = $_POST['series'];
		}

		public function setSeries($series){
			$this->series = $series;
		}

		public function getRepeticiones(){
			return $this->repeticiones = $_POST['repeticiones'];
		}

		public function setRepeticiones($repeticiones){
			$this->repeticiones = $repeticiones;
		}

		public function getDia(){
			return $this->dia = $_POST['dia'];
		}

		public function setDia($dia){
			$this->dia = $dia;
		}

		/**---------TABLA USUARIOS------------**/
		public function getUsuario(){
			return $this->usuario = $_POST['user'];
		}
		
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		
		public function getPass(){
			return $this->pass = $_POST['pass'];
		}
		
		public function setPass($pass){
			$this->pass = $pass;
		}
		
		public function getidtipou(){
			return $this->idtipou = $_POST['idtipou'];
		}
		
		public function setidtipou($idtipou){
			$this->idtipou = $idtipou;
		}


		/**---------FUNCIONES DE DB------------**/

		public function checkLogin(){
			$this->db->logeo($this->getUsuario(), $this->getPass());
		}

		public function verCliRut(){
			$this->db->selectRutina();
		}

		public function verCliDiet(){
			$this->db->selectDieta();
		}

		public function verCliObs(){
			$this->db->selectObservaciones();
		}

		public function insertarCli(){
			$this->db->insertCliente($this->getNombre(),$this->getApepat(),$this->getApemat(),
				$this->getFnac(),$this->getEdad(),$this->getPeso(),$this->getAltura(),$this->getTel(),
				$this->getDir(),$this->getDieta(), $this->getObs());
		}

		public function insertarEmpleado(){

			switch ($this->getIdEm()) {
				case 'Administrador':
					$intvalue = 1;
					$this->idEm = intval($intvalue);
					/**echo $this->idEm;**/
					break;
				case 'Empleado':
					$intvalue = 2;
					$this->idEm = intval($intvalue);
					/**echo $this->idEm;**/
					break;
				case 'Instructor':
					$intvalue = 3;
					$this->idEm = intval($intvalue);
					/**echo $this->idEm;**/
					break;

				default:
					# code...
					break;
			}


			$this->db->insertEmpleado($this->getNombreEm(),$this->getApepatEm(),$this->getApematEm(),
				$this->getFnacEm(),$this->getEdadEm(), $this->getSexo(), $this->getTelEm(), $this->idEm);
		}


		public function insertarPag(){
			$this->db->insertPago($this->getCantidad(), $this->getFpago(), $this->getIdclie());
		}

		public function verCliente(){
			$this->db->verClientes();
		}

		public function verCliPago(){
			$this->db->checarFechaPago();
		}

		public function upClienDie(){
			$this->db->updClienDieta($this->getDieta(), $this->getIdclie());
		}

		public function upClienObs(){
			$this->db->updClienObs($this->getObs(), $this->getIdclie());
		}

		public function insertarRut(){
			$this->db->insertRutina($this->getRutina(),$this->getSeries(), $this->getRepeticiones(),
			 $this->getDia(), $this->getIdclie());
		}
	}
	$us = new usuario();
?>