<?php 
	include '../Modelo/Bd/conexion.php';

	class daoVotacion {

		public function listarRegiones() {
			$cone = new conexion();

			$sql = mysqli_query($cone->abrirConexion(), "SELECT * FROM regiones");

			return $sql;
		}

		public function listarComunas($region) {
			$cone = new conexion();

			$sql = mysqli_query($cone->abrirConexion(), "SELECT * FROM comunas WHERE region = $region");

			return $sql;
		}

		public function listarCandidatos() {
			$cone = new conexion();

			$sql = mysqli_query($cone->abrirConexion(), "SELECT * FROM candidatos");

			return $sql;
		}

		public function listarVotaciones() {
			$cone = new conexion();

			$sql = mysqli_query($cone->abrirConexion(), "SELECT * FROM votos");

			return $sql;
		}

		public function buscarVotante($rut) {
			$cone = new conexion();

			$sql = mysqli_query($cone->abrirConexion(), "SELECT * FROM votos WHERE rut = '$rut'");

			mysqli_data_seek($sql, 0);

			$extraido = mysqli_fetch_array($sql);

			if ($extraido) {
				return $extraido;
			}
		}

		public function agregarVotacion($newVar) {
			$cone = new conexion();
			$dao = new daoVotacion();
			$nombreApellido = $newVar->getNombreApellido();
			$alias = $newVar->getAlias();
			$rut = $newVar->getRut();
			$email = $newVar->getEmail();
			$region = $newVar->getRegion();
			$comuna = $newVar->getComuna();
			$candidato = $newVar->getCandidato();
			$chkWeb = $newVar->getEnteraPorWeb();
			$chkTV = $newVar->getEnteraPorTv();
			$chkRedesSociales = $newVar->getEnteraPorRedSoc();
			$chkAmigo = $newVar->getEnteraPorAmigo();

			$buscarRut = $dao->buscarVotante($rut);

			if ($buscarRut) {
				echo "Lo sentimos!, las votaciones solo se hacen 1 vez y nuestros registros indican que el rut: " . $rut . " ya cuenta con su boto en el sistema.";
			}
			else {
				$sql = mysqli_query($cone->abrirConexion(), "INSERT INTO votos VALUES (0, '$nombreApellido' , '$alias', '$rut', '$email', '$region', '$comuna', '$candidato', '$chkWeb', '$chkTV', '$chkRedesSociales', '$chkAmigo')");

				return $sql;
			}
		}
	}

?>