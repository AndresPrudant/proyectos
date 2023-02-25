<?php 
	class conexion {

		public $servername;
		public $database;
		public $username;
		public $password;

		public function __construct() {
			$this->servername = "localhost";
			$this->database = "bdVotos";
			$this->username = "root";
			$this->password = "";
		}

		public function abrirConexion() {
			$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);

			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}
			
			return $conn;
		}
	}
?>