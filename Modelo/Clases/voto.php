<?php
	class voto
	{
		private $id;
		private $nombreApellido;
		private $alias;
		private $rut;
		private $email;
		private $region;
		private $comuna;
		private $candidato;
		private $enteraPorWeb;
		private $enteraPorTv;
		private $enteraPorRedSoc;
		private $enteraPorAmigo;

		public function __construct($nombreApellido, $alias, $rut, $email, $region, $comuna, $candidato, $enteraPorWeb, $enteraPorTv, $enteraPorRedSoc, $enteraPorAmigo) {
			$this->nombreApellido = $nombreApellido;
			$this->alias = $alias;
			$this->rut = $rut;
			$this->email = $email;
			$this->region = $region;
			$this->comuna = $comuna;
			$this->candidato = $candidato;
			$this->enteraPorWeb = $enteraPorWeb;
			$this->enteraPorTv = $enteraPorTv;
			$this->enteraPorRedSoc = $enteraPorRedSoc;
			$this->enteraPorAmigo = $enteraPorAmigo;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function setNombreApellido($nombreApellido) {
			$this->nombreApellido = $nombreApellido;
		}

		public function setAlias($alias) {
			$this->alias = $alias;
		}

		public function setRut($rut) {
			$this->rut = $rut;
		}

		public function setEmail($email) {
			$this->email = $email;
		}

		public function setRegion($region) {
			$this->region = $region;
		}

		public function setComuna($comuna) {
			$this->comuna = $comuna;
		}

		public function setCandidato($candidato) {
			$this->candidato = $candidato;
		}

		public function setEnteraPorWeb($enteraPorWeb) {
			$this->enteraPorWeb = $enteraPorWeb;
		}

		public function setEnteraPorTv($enteraPorTv) {
			$this->enteraPorTv = $enteraPorTv;
		}

		public function setEnteraPorRedSoc($enteraPorRedSoc) {
			$this->enteraPorRedSoc = $enteraPorRedSoc;
		}

		public function setEnteraPorAmigo($enteraPorAmigo) {
			$this->enteraPorAmigo = $enteraPorAmigo;
		}

		public function getId() {
			return $this->id;
		}

		public function getNombreApellido() {
			return $this->nombreApellido;
		}

		public function getAlias() {
			return $this->alias;
		}

		public function getRut() {
			return $this->rut;
		}

		public function getEmail() {
			return $this->email;
		}

		public function getRegion() {
			return $this->region;
		}

		public function getComuna() {
			return $this->comuna;
		}

		public function getCandidato() {
			return $this->candidato;
		}

		public function getEnteraPorWeb() {
			return $this->enteraPorWeb;
		}

		public function getEnteraPorTv() {
			return $this->enteraPorTv;
		}

		public function getEnteraPorRedSoc() {
			return $this->enteraPorRedSoc;
		}

		public function getEnteraPorAmigo() {
			return $this->enteraPorAmigo;
		}

		public function mostrarInfo() {
			return "ID: " . $this->id . " | NOMBRE y APELLIDO: " . $this->nombreApellido . " | ALIAS: " . $this->alias . " | RUT: " . $this->rut . " | EMAIL: " . $this->email . " | REGION: " . $this->region . " | COMUNA: " . $this->comuna . " | CANDIDATO: " . $this->candidato . " | SE ENTERA POR WEB: " . $this->enteraPorWeb . " | SE ENTERA POR TV: " . $this->enteraPorTv . " | SE ENTERA POR RED SOCIAL: " . $this->enteraPorRedSoc . " | SE ENERA POR AMIGO: " . $this->enteraPorAmigo;
		}
	}
?>