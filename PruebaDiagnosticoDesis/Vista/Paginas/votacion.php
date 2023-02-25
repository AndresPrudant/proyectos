<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../Css/votacion.css">
		<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
		<script src="../Js/votacion.js"></script>
		<title>Votación</title>
	</head>
	<body>
		<form onsubmit="votar(); return false;" method="POST">
			<h2>FORMULARIO DE VOTACIÓN</h2>
			<div class="contenedor">
				<div class="fila">
					<label>Nombre y Apellido</label>
					<input class="txtFormulario" type="text" name="txtNombreApellido" id="txtNombreApellido" required>
				</div>
				<div class="fila">
					<label>Alias</label>
					<input class="txtFormulario" type="text" name="txtAlias" id="txtAlias" required pattern="[a-zA-Z0-9]{6,50}" title="El alias debe contener letras, números y debe tener con mínimo 6 caracteres.">
				</div>
				<div class="fila">
					<label>RUT</label>
					<input class="txtFormulario" type="text" name="txtRut" id="txtRut" required pattern="^(\d{2}\.\d{3}\.\d{3}-)([a-zA-Z]{1}$|\d{1}$)" title="El rut debe ser en el siguiente formato: 9.999.999-9 o 99.999.999-9 (Se deben agregar puntos y guión)">
				</div>
				<div class="fila">
					<label>Email</label>
					<input class="txtFormulario" type="text" name="txtEmail" id="txtEmail" required pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" title="El email debe tener el siguiente formato: ejemplo@ejemplo.ejemplo">
				</div>
				<div class="fila">
					<label>Región</label>
					<select name="ddlRegion" id="ddlRegion" onchange="cargarComuna()" required>
						<option value="">Seleccione Región...</option>
					</select>
				</div>
				<div class="fila">
					<label>Comuna</label>
					<select name="ddlComuna" id="ddlComuna" required>
						<option value="">Seleccione Comuna...</option>
					</select>
				</div>
				<div class="fila">
					<label>Candidato</label>
					<select name="ddlCandidato" id="ddlCandidato" required>
						<option value="">Seleccione Candidato...</option>
					</select>
				</div>
				<div class="fila">
					<label class="labelFormulario">Como se enteró de Nosotros</label>
					<input class="btnChk" type="checkbox" name="chkEnterar" value="0" id="chkWeb">
					<p>Web</p>
					<input class="btnChk" type="checkbox" name="chkEnterar" value="0" id="chkTV">
					<p>TV</p>
					<input class="btnChk" type="checkbox" name="chkEnterar" value="0" id="chkRedesSociales">
					<p>Redes Sociales</p>
					<input class="btnChk" type="checkbox" name="chkEnterar" value="0" id="chkAmigo">
					<p>Amigo</p>
				</div>

				<div class="fila">
					<input class="btnVotar" type="submit" id="btnVotar" value="Votar">
				</div>
			</div>
		</form>
	</body>
</html>