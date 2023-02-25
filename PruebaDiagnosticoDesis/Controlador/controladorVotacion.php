<?php
	include '../Modelo/Dao/daoVotacion.php';
	include '../Modelo/Clases/voto.php';
	$load = $_GET['load'];
	$region = $_GET['reg'];

	if ($load == 0 && $region == 0) {

		$daoVotacion = new daoVotacion();

		$listarRegiones = $daoVotacion->listarRegiones();

		$listado = [];

		while ($result = mysqli_fetch_array($listarRegiones)) {
			array_push($listado, array('ID' => $result['id'], 'NOMBRE' => $result['nombre']));
		}

		$listadoJson = json_encode($listado);
		echo $listadoJson;

	} elseif ($load == 1) {
		$daoVotacion = new daoVotacion();

		$listarCandidatos = $daoVotacion->listarCandidatos();

		$listado = [];

		while ($result = mysqli_fetch_array($listarCandidatos)) {
			array_push($listado, array('ID' => $result['id'], 'NOMBRE' => $result['nombre']));
		}

		$listadoJson = json_encode($listado);
		echo $listadoJson;

	} elseif ($region != 0 and $load != 2) {
		$daoVotacion = new daoVotacion();

		$listarComunas = $daoVotacion->listarComunas($region);

		$listado = [];

		while ($result = mysqli_fetch_array($listarComunas)) {
			array_push($listado, array('ID' => $result['id'], 'NOMBRE' => $result['nombre']));
		}

		$listadoJson = json_encode($listado);
		echo $listadoJson;
	}

	if ($load == 2) {

		$txtNombreApellido = $_POST['NOMBRE_APELLIDO'];
		$txtAlias = $_POST['ALIAS'];
		$txtRut = $_POST['RUT'];
		$txtEmail = $_POST['EMAIL'];
		$ddlRegion = $_POST['REGION'];
		$ddlComuna = $_POST['COMUNA'];
		$ddlCandidato = $_POST['CANDIDATO'];
		$chkWeb = $_POST['WEB'];
		$chkTV = $_POST['TV'];
		$chkRedesSociales = $_POST['REDES_SOCIALES'];
		$chkAmigo = $_POST['AMIGO'];

		$voto = new voto($txtNombreApellido, $txtAlias, $txtRut, $txtEmail, $ddlRegion, $ddlComuna, $ddlCandidato, $chkWeb, $chkTV, $chkRedesSociales, $chkAmigo);
		$daoVotacion = new daoVotacion();

		$agregarVotacion = $daoVotacion->agregarVotacion($voto);

		if ($agregarVotacion) {
			echo "Se ha podido votar satisfactoriamente!";
		}
	}
?>