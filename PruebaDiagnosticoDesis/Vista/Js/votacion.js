$(document).ready(function() {
    cargarRegiones();
    cargarCandidatos();
});

function cargarRegiones() {
    const select = document.querySelector("#ddlRegion");
    $.ajax({
        type: "POST",
        url: '../../Controlador/controladorVotacion.php?load=0&reg=0',
        dataType: 'json',
        success: function (data) {
            if (data === "[]") {
                alert("No se encuentran datos");
                return false;
            }

            for (var i = 0; i < data.length; i++) {
                const option = document.createElement('option');

                const id = data[i]['ID'];
                const nombre = data[i]['NOMBRE'];

                option.value = id;
                option.text = nombre;
                select.appendChild(option);
            }
        }
    })
}

function cargarComuna() {
    var ddlRegion = document.getElementById("ddlRegion").options[document.getElementById("ddlRegion").selectedIndex].value;
    const select = document.querySelector("#ddlComuna");
    var option = document.createElement('option');

    for (let i = select.options.length; i >= 0; i--) {
        select.remove(i);
    }

    option.value = '';
    option.text = 'Seleccione Comuna...';
    select.appendChild(option);

    $.ajax({
        type: "POST",
        url: '../../Controlador/controladorVotacion.php?load=0&reg=' + ddlRegion,
        dataType: 'json',
        success: function (data) {
            if (data === "[]") {
                alert("No se encuentran datos");
                return false;
            }

            for (var i = 0; i < data.length; i++) {
                option = document.createElement('option');

                const id = data[i]['ID'];
                const nombre = data[i]['NOMBRE'];

                option.value = id;
                option.text = nombre;
                select.appendChild(option);
            }
        }
    })
}

function cargarCandidatos() {
    const select = document.querySelector("#ddlCandidato");
    $.ajax({
        type: "POST",
        url: '../../Controlador/controladorVotacion.php?load=1&reg=0',
        dataType: 'json',
        success: function (data) {
            if (data === "[]") {
                alert("No se encuentran datos");
                return false;
            }

            for (var i = 0; i < data.length; i++) {
                const option = document.createElement('option');

                const id = data[i]['ID'];
                const nombre = data[i]['NOMBRE'];

                option.value = id;
                option.text = nombre;
                select.appendChild(option);
            }
        }
    })
}

function votar() {

	var txtNombreApellido = document.getElementById("txtNombreApellido").value;
	var txtAlias = document.getElementById("txtAlias").value;
	var txtRut = document.getElementById("txtRut").value;
	var txtEmail = document.getElementById("txtEmail").value;
	var ddlRegion = document.getElementById("ddlRegion").options[document.getElementById("ddlRegion").selectedIndex].value;
	var ddlComuna = document.getElementById("ddlComuna").options[document.getElementById("ddlComuna").selectedIndex].value;
	var ddlCandidato = document.getElementById("ddlCandidato").options[document.getElementById("ddlCandidato").selectedIndex].value;
	var chkWeb = document.getElementById("chkWeb").value;
	var chkTV = document.getElementById("chkTV").value;
	var chkRedesSociales = document.getElementById("chkRedesSociales").value;
	var chkAmigo = document.getElementById("chkAmigo").value;
    var numeroCheck = document.getElementsByName("chkEnterar").checked;
    var contador = 0;

	if (txtNombreApellido == "") {
		return false;
	}

	if (txtAlias.length <= 5) {
		alert("El alias no cumple con los requisitos, este debe tener como mínimo 6 caracteres.")
		return false;
	}

	if (txtRut == "" || txtEmail == "" || ddlRegion == "" || ddlComuna == "" || ddlCandidato == "") {
		alert("Se deben ingresar todos los datos requeridos.")
		return false;
	}

	if ($('#chkWeb').is(":checked")) {
        chkWeb = "1";
        contador = contador + 1;
    }

    if ($('#chkTV').is(":checked")) {
        chkTV = "1";
        contador = contador + 1;
    }

    if ($('#chkRedesSociales').is(":checked")) {
        chkRedesSociales = "1";
        contador = contador + 1;
    }

    if ($('#chkAmigo').is(":checked")) {
        chkAmigo = "1";
        contador = contador + 1;
    }

    if (contador < 2) {
        alert("Se deben seleccionar al menos 2 opciones de la sección 'Como se enteró de nosotros'");
        return false;
    }

    $.ajax({
        data: {
            NOMBRE_APELLIDO: txtNombreApellido,
            ALIAS: txtAlias,
            RUT: txtRut,
            EMAIL: txtEmail,
            REGION: ddlRegion,
            COMUNA: ddlComuna,
            CANDIDATO: ddlCandidato,
            WEB: chkWeb,
            TV: chkTV,
            REDES_SOCIALES: chkRedesSociales,
            AMIGO: chkAmigo
        },
        type: "POST",
        async: false,
        url: '../../Controlador/controladorVotacion.php?load=2&reg=' + ddlRegion,
        success: function (data) {
            if (data === "[]") {
                alert("Problema interno: Se ha producido un error en la operación");
                return false;
            }
            
            alert(data);

            window.location.href = "";
        }
    })
}